import React, {useMemo, useState} from 'react';
import Item from "./Item";
import DragHandlers from "../handlers/DragHandlers";
import AddTicket from "./AddTicket";
import Input from "./UI/Input";
import TicketsFilters from "./TicketsFilters";
import ModalDlg from "./UI/dialogs/ModalDlg";
import Button from "./UI/buttons/Button";

const Panel = (props) => {
    const [tickets, setTickets] = useState(props.items)

    const [filter,setFilter] = useState({query:'',sort:''});
    const [modal,setModal] = useState(false);

    const sortedTickets = useMemo(()=>{
        return [...tickets].sort((a,b)=>a.sort - b.sort);
    },[tickets]);

    const searchTickets = useMemo(()=>{
                   return sortedTickets.filter(t=>t.title.toLowerCase().includes(filter.query.toLowerCase()));
    },[filter.query,sortedTickets]);
    
    const createTicket =(newTicket)=>{
        setTickets([...tickets,newTicket]);
        setModal(false);
    }
    const removeTicket = (ticket)=>{
        setTickets(tickets.filter(p=>p.id!==ticket.id))
    }
    const handlers = props.handlers(tickets,setTickets);

    return (
        <div className="col-4 p-3">
            <h3>{props.title} {props.id==='todo'?<Button onClick={()=>setModal(true)}>Add</Button>:''}</h3>
            <TicketsFilters filter={filter} setFilter={setFilter}/>
            {props.id==='todo'?
                <ModalDlg visible={modal} setVisible={setModal} title={"Add Task to TODO List"}>
                <div className={"add-todo row"}>
               <AddTicket createTicket={createTicket}/>
            </div>
                </ModalDlg>
                :''}
            <div id={props.id} className="col" style={{minHeight:"300px"}} onDrop={(e)=>handlers.dragDropPanel(e,props.id,tickets.length)} onDragOver={(e)=>e.preventDefault()}>
                {searchTickets.map((i,idx)=>
                    <Item key={i.id} data={i}  index={idx} handlers={handlers} remove={removeTicket}/>
                )}

            </div>
        </div>
    );
};

export default Panel;