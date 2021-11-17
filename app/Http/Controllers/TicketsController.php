<?php
namespace App\Http\Controllers;
use App\Http\Resources\TicketResource;
use App\Models\Repository\ITickets;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketsController extends BaseController
{
    /**
     * @var ITickets
     */
    private $tickets;
    /**
     * @var Request
     */
    private $request;


    /**
     * TicketsController constructor.
     * @param Request $request
     * @param ITickets $tickets
     */
    public function __construct(Request $request, ITickets $tickets)
    {

        $this->tickets = $tickets;
        $this->request = $request;
    }

    public function index()
    {

        $tickets =  $this->tickets->getAllActiveByPanel($this->request->get('panel'));
        return response()->success('Ticket Created Successfully!', TicketResource::collection($tickets)->jsonSerialize());
    }

    public function create()
    {
        $this->request->validate([
            'title' => 'required|max:200',
            'description' => 'required',
        ]);
        $sort = $this->tickets->getSortValue('todo');
        $sortValue = $sort==null?0:$sort->getSort();
        try {
            $newTicket = array(
                'title' => $this->request->get('title'),
                'description' => $this->request->get('description'),
                'sort' => $sortValue+1,//$this->request->get('sort'), //getLast sort value by panelId
                'panelId' => 1,
                'active' => 1,
                'addedAt' => time()
            );
            
            /** @var Ticket $res */
            $res = $this->tickets->create($newTicket);
            
            return response()->success('Ticket created successfully',(new TicketResource($res))->jsonSerialize());
        }catch(\Exception $ex)
        {
            return response()->error('Error: ', $ex->getMessage());
        }

    }
    public function move()
    {
        try {
            /** @var Ticket $ticket */
            $ticket = $this->tickets->getById($this->request->get('id'));
            $ticket->setPanelId($this->request->get('panel'));
            $ticket->setSort($this->request->get('sort'));
            $this->tickets->update($ticket);
            return response()->success('Ticket moved successfully',(new TicketResource($ticket))->jsonSerialize());
        }catch(\Exception $ex)
        {
            return response()->error('Error:',$ex->getMessage());
        }
    }
    public function delete()
    {
        try {
            $ticket = $this->tickets->getById($this->request->get('id'));
            $this->tickets->delete($ticket);
            return response()->success('Ticket delete successfully',(new TicketResource($ticket))->jsonSerialize());
        }catch (\Exception $ex)
        {
            return response()->error('Error:',$ex->getMessage());
        }
    }

}