let plus = document.querySelectorAll("#plus");
let count = document.querySelectorAll("#quantity");
let minus = document.querySelectorAll("#minus");
let price = document.querySelectorAll("#p_price");

let a=1;
let p = 10.50;
for(i=0; i<plus.length; i++){
    plus[i].addEventListener("click" , ()=>{
        a++; 
        p = p + 10.50;
        a = (a < 10) ? "0" + a : a;
        for(i=0; i<count.length; i++){
              count[i].innerText = a;
        }
      
        for(i=0; i<price.length; i++){
            price[i].innerText = "$" + p;
        }
    });
    };

for(i=0; i<minus.length; i++){
    minus[i].addEventListener("click" , ()=>{
        if(a > 1){
            a--;
            p = p - 10.50 ;
            a = (a < 10) ? "0" + a : a;
            for(i=0; i<count.length; i++){
                count[i].innerText = a;
          }
          for(i=0; i<price.length; i++){
            price[i].innerText = "$" + p;
        }
        }
      
    });
}
