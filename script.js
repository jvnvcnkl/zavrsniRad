<br/>
const commentsButton = document.querySelector('.btn')
const commentDiv=document.querySelector('.comments')
console.log(commentsButton)
commentsButton.addEventListener('click', () =>{
    
    if (commentDiv.style.display === "none") 
    {
        commentDiv.style.display = "block"; 
        commentsButton.value = 'Show comments'
    } 
    else {
        commentDiv.style.display = "none";
        
    }
})