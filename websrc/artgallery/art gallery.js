// set an index for each artwork page and go to a different indexed artwork each time



//Buy button that lets user buy a piece of artwork
//    var money = 10000;
//    var buyA = 10000;

    function BuyA(isUserlogin,artworkId, arttype) {
        if(isUserlogin=='0'){
            alert("Want to make as your preference? \nRegister, login and have fun!");
            return;
        }else{
            $.ajax({
                type: "GET",
                url: '../../be/pgreq/user_event_action.php?purchaseArtwork=true&artworkId='+artworkId,
                success: function(data)
                {
                    if(data.indexOf("successful")>=0){
                        alert("Thanks for selecting a preference! \n\n [" + arttype + "] is your new preference now. \n\n ENJOY your recommended Art Collection and Events \n\n Don't forget ENJOY your new PORTOFOLIO! \n\n^_^");
                    }else{
                        alert(data); // show response from the php script. 
                    }
                }
            });
        }
        //if (money >= buyA) {
            // deduct the money
            // money - buyA;
            //money = money - buyA;
            
            // increase the price
            // buyA + 250;
            //buyA = buyA;
            
            // update the values
            //document.getElementById("money").innerHTML = "MONEY: $" + money;
            //document.getElementById("cost").innerHTML = "COST: $" + buyA;

            // window.alert("Thanks for selecting a preference!")
        }
    //    else {
    //       window.alert("Not Enough Money")
        



