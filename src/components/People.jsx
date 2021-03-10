import React from "react";
import Data from "./data.json";



let People = () => {
    return (
        <div>
            {Data.map(x =>{
                return( 
                    <div>
                        <div>{x.name}</div>
                    </div>
                )})   
            }
        </div>
    );
}

export default People;