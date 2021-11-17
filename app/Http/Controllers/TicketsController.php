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
        //dd($this->request->get('id'));
        $this->request->validate([
            'title' => 'required|max:200',
            'description' => 'required',
        ]);
        try {
            $newTicket = array(
                'title' => $this->request->get('title'),
                'description' => $this->request->get('description'),
                'sort' => $this->request->get('sort'), //getLast sort value by panelId
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

}