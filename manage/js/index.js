var lis=document.getElementsByTagName('li');
console.log(lis.length);
function show(self) {
     for(var i=0;i<lis.length;i++){
          lis[i].className='';
        }
    self.className='first'; 
    //===========//
    
} 
