<?php


namespace App\Models\Repository;


interface ITickets extends IRepository
{

     function getAllActiveByPanel($panel);
     function getSortValue($panel);
}