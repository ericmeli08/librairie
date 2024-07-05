import { $$ } from "./selector.js"

export function infinityHorizontalScroll(items,time) {
            
    const elts  = $$(items)
    let n = elts.length
    let width = elts[0].offsetWidth
    let spaceItem = elts[1].offsetLeft - (elts[0].offsetLeft + elts[0].clientWidth)//no padding
    let index = Array(n).fill(-1) 
    elts.forEach(function(elt){elt.style.transition = `${time}s transform linear`})
  
    function move(i){
        elts[i].style.opacity = (index[i] == (n-i-2)) ? 0 : 1       
        elts[i].style.transform = `translateX(${(width+spaceItem)*(index[i])}px)`
        index[i]--;
        if(index[i] == (-i-2))
            index[i]=(n-i-2); 
    }
    
    setInterval(function(){
        for (let t = 0; t < n; t++) {
            move(t)            
        }
    },(time*1000))
}