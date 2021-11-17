import axios from 'axios';
import {API_URL} from "@env"

export default class TicketService{
    static url= API_URL||"http://trello-laravel.terekhiin-development.com/api/tickets";
    static async getAll() {
        return await axios.get(this.url);
    }
    static async getAllByPanel(panel)
    {
        return await axios.get(this.url,{params:{
            panel:panel
        }})
    }
    static async create(ticket)
    {
      return await axios.post(this.url+'/create',ticket);
    }
    static async moveTicket(id,panel,sort)
    {
        return await axios.post(this.url+'/move',{
            id:id,
            panel:panel,
            sort:sort
            })
    }
    static async removeTicket(id){
        return await axios.delete(this.url+'/delete',{params:{id:id}})
    }

}