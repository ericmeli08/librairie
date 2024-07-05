export function scrollToTop(){
    window.scrollTo({
        top: 0,
        behavior: 'smooth',
        duration:6000
    })
}

/**
 *  
 * @param {HTMLElement} elemt 
 */
export function menuAnimation(elemt){
    let firstChield = elemt.nextElementSibling
    if(firstChield){
        
        if(window.innerWidth > 1150){
            elemt.addEventListener("mouseover",function(){
                 firstChield.style.height = "500px"
             })
            elemt.addEventListener("mouseout",function(){
                 firstChield.style.height = "0px"
             })
        }else{
            let parent = elemt.parentElement
            parent.addEventListener('click',function(){
                parent
                .lastElementChild
                .classList.toggle("rotate-180")
                const sub = this.firstElementChild.nextElementSibling
                sub.style.height =  (sub.style.height == "240px") ? "0px": "240px"
            })
        }
    }
}