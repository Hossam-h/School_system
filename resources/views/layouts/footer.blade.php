<!-- Footer opened -->
 <footer class="bg-white p-4">
      <div class="row">
        <div class="col-md-6">
          <div class="text-center text-md-left">
              <p class="mb-0"> &copy; Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
          </div>
        </div>
        <div class="col-md-6">
          <ul class="text-center text-md-right">
            <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
            <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
            <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
          </ul>
        </div>
      </div>
    </footer>
<!-- Footer closed -->
<script>
    function CheckAll(classname,el){
    let elements=document.getElementsByClassName(classname);
   let el_Lenght = elements.length

   if(el.checked){

       for(let i=0; i<el_Lenght; i++ ){
        elements[i].checked=true
       }
   }else{
    for(let i=0; i<el_Lenght; i++ ){
        elements[i].checked=false
       }
   }

}



</script>
