import React, {useState} from 'react';
import Panel from "./Panel";
import DragHandlers from "../handlers/DragHandlers";
import Button from "./UI/buttons/Button";
import Input from "./UI/Input";
import AddTicket from "./AddTicket";

const Board = () => {
    const items =[
        {id:1,panel:"todo",title:"1",description:"",sort:1},
        {id:2,panel:"todo",title:"2",description:"",sort:2},
        {id:3,panel:"in_progress",title:"3",description:"",sort:2},
        {id:4,panel:"in_progress",title:"4",description:"",sort:1},
        {id:5,panel:"done",title:"5",description:"",sort:1},
        {id:6,panel:"done",title:"6",description:"",sort:3}
    ];


    const getTickets = (items,panel)=>{
        return items.filter(t=>t.panel===panel);//.sort((a, b)=>{
 //               return a.sort-b.sort;
   //         });
    }
    const  dragHandlers = DragHandlers();

    return (
        <div className="border row">
               <Panel  title="TODO"  id="todo" key="todo" items={getTickets(items,"todo")} handlers = {dragHandlers}/>
                <Panel  title="In Progress"  id="in_progress" key="in_progress" items={getTickets(items,"in_progress")} handlers={dragHandlers}/>
                <Panel  title="DONE"  id="done" key="done" items={getTickets(items,"done")} handlers={dragHandlers}/>
            </div>
    );
};

export default Board;