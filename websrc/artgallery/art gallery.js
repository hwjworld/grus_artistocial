//Buy button that lets user buy a piece of artwork
    var money = 10000;
    var buyA = 2000;

    function BuyA() {
        if (money >= buyA) {
            // deduct the money
            // money - buyA;
            money = money - buyA;
            
            // increase the price
            // buyA + 250;
            buyA = buyA;
            
            // update the values
            document.getElementById("money").innerHTML = "MONEY: $" + money;
            document.getElementById("cost").innerHTML = "COST: $" + buyA;
        }
        else {
            window.alert("Not Enough Money")
        }
    }

