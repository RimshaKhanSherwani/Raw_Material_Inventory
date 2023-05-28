// Call addQuanInput() function on Save button click
function addQuanInput(id){ 
    const container = document.getElementById(`Quantityfield${id}`); 
    const input= document.createElement("div");
    
    
    input.innerHTML=`<input type="number" name="inputQ" id="QuaninputField${id}">
    <button onclick="saveQuan(${id})"> save </button> <button onclick="cancelQuan(${id})"> cancel </button>`; //string literal
    container.append(input);
    document.getElementById(`addQuantityBtn${id}`).disabled=true;
    const vq1= document.getElementById(`addQuantityBtn${id}`).style.background="lightgrey";
    const vq2= document.getElementById(`addQuantityBtn${id}`).style.borderBlockColor="grey";
    
}

// Call addPriceInput() function on Save button click
function addPriceInput(id){ 
    // const p = document.getElementById(`Pricefield${id}`); 
    // console.log("This is the price of item "+p.value);
    const container = document.getElementById(`Pricefield${id}`);
    const input= document.createElement("div");
    
    
    input.innerHTML=`<input type="number" name="inputP" id="PriceinputField${id}">
    <button onclick="savePrice(${id})"> save </button> <button onclick="cancelPrice(${id})"> cancel </button>`; //string literal
    container.append(input); 
    document.getElementById(`addPriceBtn${id}`).disabled=true;
    const v1= document.getElementById(`addPriceBtn${id}`).style.background="lightgrey";
    const v2= document.getElementById(`addPriceBtn${id}`).style.borderBlockColor="grey";
}

// Call saveQuan() function on Cancel button click
function saveQuan(id){
        const quantity = document.getElementById(`QuaninputField${id}`).value; 
        console.log(quantity);
        const preq = document.getElementById(`QuantityfieldDis${id}`).innerHTML; 
        console.log(preq);
         $.ajax({
             url: '/add-quantity',
             type: 'POST',
             headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
             data : {id:id, quantity:quantity},
             success: function(response){
                 if(response.success){
                     window.location.reload();
                     alert("Quantity Updated Successfuly");
                 }
              },
             error: function(error){
               console.log(error)
             }
        });

    }

//Call SavePrice function..
function savePrice(id){
    const price = document.getElementById(`PriceinputField${id}`).value; 
    console.log(price);
    const itemName = document.getElementById(`namefield${id}`).innerHTML;
    console.log(itemName);
    const pre = document.getElementById(`PricefieldDis${id}`).innerHTML; 
    console.log(pre);
         $.ajax({
             url: '/pre-price',
             type: 'POST',
             headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
             data : {id:id, itemName:itemName, pre:pre, price:price},
             success: function(response){
                 if(response.success){
                     window.location.reload();
                     alert("Previous Price added into price logs");
                 }
              },
             error: function(error){
              console.log(error)
             }
        });
    
        $.ajax({
        url: '/add-price',
        type: 'POST',
        headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
        data : {id:id, price:price},
        success: function(response){
            if(response.success){
                window.location.reload();
                alert("Price Updated Successfuly");
            }
         },
        error: function(error){
          console.log(error)
        }
    });
    
}

// Call cancelQuan() function on Cancel button click
function cancelQuan(id){
    const child = document.getElementById(`QuaninputField${id}`);
    child.parentElement.remove();
    const button1 = document.getElementById(`addQuantityBtn${id}`);
    button1.disabled=false;
    button1.style.background="#0BDA51";
    button1.style.borderBlockColor="0.5px solid #00A36C";
    
    
}

// Call cancelPrice() function on Cancel button click
function cancelPrice(id){
    const child = document.getElementById(`PriceinputField${id}`);
    child.parentElement.remove();
    const button2 = document.getElementById(`addPriceBtn${id}`);
    button2.disabled=false;
    button2.style.background="#0BDA51";
    button2.style.borderBlockColor="0.5px solid #00A36C";
}

// function clearBtn(id){
//     const Pid= document.getElementById(`logID${id}`).innerHTML;
//     console.log(Pid);
//     const prep=document.getElementById(`prePrice${id}`).innerHTML;
//     console.log(prep);
//     const upPrice=document.getElementById(`updatedPrice${id}`).innerHTML;
//     console.log(upPrice);

//     $.ajax({
//         url: '/del-log',
//         type: 'POST',
//         headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
//         data : {Pid:Pid},
//         success: function(response){
//             if(response.success){
//                 window.location.reload();
//                 alert("Price Log "+id+" deleted Successfuly");
//             }
//          },
//         error: function(error){
//           console.log(error)
//         }
//     });
// }