import axios from 'axios';

export default class TicketService{
    static url= "http://localhost/api/";
    static async getAll() {
        return await axios.get(this.url+'tickets');
    }
    static async getAllByPanel(panel)
    {
        return await axios.get(this.url+'tickets',{params:{
            panel:panel
        }})
    }
    static async create(ticket)
    {
      return await axios.post('http://localhost/api/tickets/create',ticket);
    }

}