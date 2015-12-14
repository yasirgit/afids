<?php

/**
 * aircraft actions.
 *
 * @package    angelflight
 * @subpackage aircraft
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class aircraftActions extends sfActions
{
	/**
	 * Searches aircrafts
	 * CODE:aircraft_index
	 */
	public function executeIndex(sfWebRequest $request)
	{
		# security
                if( !$this->getUser()->hasCredential(array('Administrator','Staff','Pilot','Coordinator','Volunteer'), false)){
                    $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
                    $this->redirect('dashboard/index');
                }
                
		$this->getUser()->addRecentItem('Aircraft', 'aircraft', 'aircraft/index');
		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		slot('nav_menu', array('reference', 'find-aircraft'));

		$this->processFilter($request);
		if($request->hasParameter('search') && $request->hasParameter('name'))
		{	
			$this->pager = AircraftPeer::getPilotsThatFlySpecificAircraft($this->max,$this->page,$this->make,
			$this->model,
			$this->name
			);
			$this->last_page = ceil(count($this->pager[1])/$this->max);
			$this->pagers = $this->pager[0];
			
			$this->selectedAircraft = $this->name;
			if(($this->page - 1) > 1) $this->previousPage = ($this->page - 1);
			else $this->previousPage = 1;
			
			if($this->previousPage != $this->last_page)
			{
				$this->nextPage = $this->previousPage + 1;
			}
			else 
			{
				$this->nextPage = $this->last_page;
			}
			$this->currentPage = $this->page; 
			return 'PilotSearch';					
		}
		
		# filter
                if($request->isMethod('post') || $request->getParameter('page')){
                    $this->pager = AircraftPeer::getPager(
                    $this->max,
                    $this->page,
                    $this->make,
                    $this->model,
                    $this->name
                    );
                    $this->aircrafts = $this->pager->getResults();
                }
	}

	/**
	 * Searches aircrafts by filter
	 */
	private function processFilter(sfWebRequest $request)
	{
		$params = $this->getUser()->getAttribute('aircraft', array(), 'aircraft');

		if (!isset($params['make'])) $params['make'] = null;
		if (!isset($params['model'])) $params['model'] = null;
		if (!isset($params['name'])) $params['name'] = null;

		$this->max_array = array(5, 10, 20, 30);

		if (in_array($request->getParameter('max'), $this->max_array)) {
			$params['max'] = $request->getParameter('max');
		}else{
			if (!isset($params['max'])) $params['max'] = sfConfig::get('app_max_person_per_page', 10);
		}

		if ($request->hasParameter('filter')) {
			$params['make']      = $request->getParameter('make');
			$params['model']       = $request->getParameter('model');
			$params['name']       = $request->getParameter('name');
		}
		
		if($request->hasParameter('search') && $request->getParameter('search') == 'pilots')
		{
			$params['name']       = $request->getParameter('name');
		}
		$this->page             = $page = $request->getParameter('page', 1);
		$this->max              = $params['max'];
		$this->make            = $params['make'];
		$this->model             = $params['model'];
		$this->name             = $params['name'];

		$this->getUser()->setAttribute('aircraft', $params, 'aircraft');
	}

	/**
	 * Add or edit aircraft
	 * CODE:aircraft_create
	 */
	public function executeUpdate(sfWebRequest $request)
	{
		# security
		if( !$this->getUser()->hasCredential(array('Administrator'), false)){
                   $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
                   $this->redirect('dashboard/index');
                }

		sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
		slot('nav_menu', array('reference', ''));

		if($request->getParameter('id')){

			$aircraft =  AircraftPeer::retrieveByPK($request->getParameter('id'));
			$this->forward404Unless($aircraft);

			$this->title = 'Edit aircraft';
			$success  = 'Aircraft information has been successfully changed!';

		}else{

			$aircraft = New Aircraft();
			$this->title = 'Add aircraft';
			$success  = 'Aircraft information has been successfully created!';

		}

		if($request->getParameter('leg')){
			$this->leg_id = $request->getParameter('leg');
		}

		$this->form = new AircraftForm($aircraft);

		if ($request->isMethod('post'))
		{

			$this->referer = $request->getReferer();

			$this->form->bind($request->getParameter('craft'));

			if ($this->form->isValid() && $this->form->getValue('cost'))
			{
				$aircraft->setMake($this->form->getValue('make'));
				$aircraft->setModel($this->form->getValue('model'));
				$aircraft->setName($this->form->getValue('name'));
				$aircraft->setFaa($this->form->getValue('faa'));

				if($this->form->getValue('engines') == null){
					$aircraft->setEngines(0);
				}else{
					$aircraft->setEngines($this->form->getValue('engines'));
				}

				if($this->form->getValue('def_seats') == null){
					$aircraft->setDefSeats(0);
				}else{
					$aircraft->setDefSeats($this->form->getValue('def_seats'));
				}

				$aircraft->setSpeed($this->form->getValue('speed'));

				if($this->form->getValue('pressurized') == null){
					$aircraft->setPressurized(0);
				}else{
					$aircraft->setPressurized($this->form->getValue('pressurized'));
				}

				$aircraft->setCost($this->form->getValue('cost'));
				$aircraft->setRange($this->form->getValue('range'));
				$aircraft->setAcLoad($this->form->getValue('ac_load'));

				if ($aircraft->isNew()) {
					$content = $this->getUser()->getName().' added new Aircraft: '.$aircraft->getMakeModel();
					ActivityPeer::log($content);
				}

				$aircraft->save();

				$this->getUser()->setFlash('success', $success);

				$back = '@aircraft';

				if($request->getParameter('leg_id')){
					$back = '@leg_edit?id='.$request->getParameter('leg_id');
				}
				return $this->redirect($back);

			}
		}else{
			# Set referer URL
			$this->referer = $request->getReferer() ? $request->getReferer() : '@aircraft';
		}
		$this->aircraft = $aircraft;
	}

	/**
	 * TODO: Check related records.
	 * CODE:aircraft_delete
	 */
	public function executeDelete(sfWebRequest $request)
	{		
		# security
		if( !$this->getUser()->hasCredential(array('Administrator'), false)){
                   $this->getUser()->setFlash("warning", 'You don\'t have permission to access this url '.$request->getReferer());
                   $this->redirect('dashboard/index');
                }
		if ($request->isMethod('delete'))
		{
			$request->checkCSRFProtection();
			$aircraft = AircraftPeer::retrieveByPK($request->getParameter('id'));

			$this->forward404Unless($aircraft);

			$this->getUser()->setFlash('success', 'Aircraft information has been successfully deleted!');

			$aircraft->delete();
		}

		return $this->redirect('@aircraft');
	}
}
