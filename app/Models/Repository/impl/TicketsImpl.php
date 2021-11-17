<?php


namespace App\Models\Repository\impl;


use App\Models\Repository\ITickets;
use App\Models\Ticket;

class TicketsImpl extends Repository implements ITickets
{

    function getAll()
    {
        return Ticket::select(array('tickets.*','p.name as panelName','p.slug as panelSlug'))->join('panels as p','p.id','=','tickets.panelId')->get();
    }

    /**
     * @return Ticket[]|\Illuminate\Support\Collection
     */
    public function getAllActive()
    {
        return Ticket::select(array('tickets.*','p.name as panelName','p.slug as panelSlug'))->join('panels as p','p.id','=','tickets.panelId')->where('tickets.Active','=',1)->get();
    }

    protected function initModelName()
    {
       return 'Ticket';
    }

    function getAllActiveByPanel($panel)
    {
        return Ticket::select(array('tickets.*','p.name as panelName','p.slug as panelSlug'))->join('panels as p','p.id','=','tickets.panelId')->where('tickets.Active','=',1)->where('tickets.panelId','=',$panel)->get();
    }

    function getSortValue($panel)
    {
        return Ticket::whereRaw('sort = (select max(`sort`) from tickets WHERE panelId=1 )')->first();
    }

}