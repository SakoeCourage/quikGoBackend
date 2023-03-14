<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('fontawesome-free/css/all.css') }}">
    <script src="{{ asset('fontawesome-free/js/all.js') }}"></script>
    
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    <script src="{{ asset('js/body-scroll-lock/lib/bodyScrollLock.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/trix-core.js') }}"></script>
    {{-- <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script> --}}
   
   
    
   <script>
   
   

     function Disablescroll(){
        
     
        return{

          showdrop:false,
          runcheck:function(){
            if (this.showdrop==true){
                bodyScrollLock.disableBodyScroll(document.querySelector('#sidebar'));

            }
            else{
                bodyScrollLock.enableBodyScroll(document.querySelector('#sidebar'));
            }
          },
              openSidebar() {
                
                this.showdrop = !this.showdrop;
                this.runcheck();
              },
              closeSidebar() {
                
                this.showdrop= false;
                this.runcheck();
              }
            }
            
        }


     

</script>
    <script>
   
      function errorhandler() {
        
        console.log(document.getElementById('imgtag').src);
        }
    </script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
    
        
     
        .hidescroll::-webkit-scrollbar {
            display: none;
           
            
        }
        .hidescroll{
          scrollbar-width: none;
          -ms-overflow-style: none;

        }
        [x-cloak] { display: none !important; }
       
        html{
          scroll-behavior: smooth;
        
        }
trix-editor ul { list-style-type: disc !important; margin-left: 1rem !important; }
trix-editor ol { list-style-type: decimal !important; margin-left: 1rem !important; }
.trix-editor ul { list-style-type: disc !important; margin-left: 1rem !important; }
.trix-editor ol { list-style-type: decimal !important; margin-left: 1rem !important; }

.scroll-card{
  opacity: 0;
  

  transform:scale(0.5);
  
  transition: all 200ms;
}
.show-scroll-card{
  transform:unset;
  

  opacity: 1;
  
}
    
.scroll-snap-x{
  scroll-snap-type: x mandatory;
  -webkit-overflow-scrolling: touch; 

  
}

.scroll-snap-center{
  scroll-snap-align: center;

}
.scroll-snap-x:hover{
  
  scroll-snap-type: none;
}
}

    </style>
    
</head>


<body  class="bg-gray-100">
    <x-header></x-header>
    @yield('content')
    {{-- <x-homepage.searchhero></x-homepage.searchhero>
    <x-homepage.landingpage></x-homepage.landingpage> --}}
    {{-- <x-SearchResult></x-SearchResult> --}}
    <x-footer></x-footer>
    






    

</body>













<script>
 
 const card = document.querySelectorAll(".scroll-card")
        const observer = new IntersectionObserver((entries)=>{
            entries.forEach(entry=>{
             
                entry.target.classList.toggle('show-scroll-card', entry.isIntersecting)
                // if(entry.isIntersecting) observer.unobserve(entry.target)
                 
            })
            
             
        }
            
        )
 

        card.forEach(card=>{
            observer.observe(card)
        })

</script>





  <script>
    // alert('i work');
    var banners = document.querySelectorAll('.banner');
    banners.forEach(banner => {
          banner.addEventListener('click',function() {
            window.location = (banner.dataset.link) ;
            
          })
         
      });

  </script>

	<script>


    function multipleImageDetect(){
          return{
                firstsate: false,
                getclicksource: function(e){
                     const [file] = e.target.files;  
                     console.log(file)

                }


          }




    }


</script>


<script>
    

function getImageProps(){
 

        return{  
          fileisvalid:true,
          filename: 'no file choosen',
          filetype: null,
          file: null,
          getfileinfo: function(){
            
            this.filename = this.file[0].name;
            this.filetype = this.file[0].type;
           
          },   
          
          checkvalidfile: function(){
           
           
           if(this.filetype == 'image/jpeg' || this.filetype == 'image/jpg' || this.filetype == 'image/png' || this.filetype == 'image/tiff')
                     { 
                      
                       
                       this.fileisvalid=true;
                     }
                     
                   else{
                   
                     this.fileisvalid=false;
                   }
                 
         },
          getimage:function(e,img){

            this.file = e.target.files
            const [file]=e.target.files
          
             if (file){
                document.querySelector(`#${img}`).src = URL.createObjectURL(file);
              
    
             }
             this.getfileinfo();
             this.checkvalidfile();
          }
      


        }
            

}




</script>

<script>


 
 
  function horizontalscroll() {
                
                var scroll = true;
                var container= document.querySelector('#recentcontainer');
                var innneritem =document.querySelector('#inneritem');
                container.addEventListener("mouseover", function () { 
                scroll = false;
                 
                 });
                 container.addEventListener("mouseout", function () {
                  scroll = true;
                 });
                  
                scrollableamout = function(){
                  let intViewportWidth = window.innerWidth;
                  let scrollamout = 0;
                  if(intViewportWidth <= 700){
                    scrollamout = 200;
                  }else if(intViewportWidth > 700 && intViewportWidth <= 900 ){
                      scrollamout = 300;
                  }
                  else if(intViewportWidth > 900){
                    scrollamout = 600;
                  }
                  return scrollamout;
                      
                }
                
             
                function autoscroll () { 
                  
                      if (container.scrollWidth != container.scrollLeft + container.getBoundingClientRect().width){
                        container.scrollBy({left: scrollableamout(), behavior: 'smooth'
                      })
                      }else{
                        container.scrollTo({left: 0, behavior: 'smooth'
                      })
                      }
                 
                 }
            setInterval(() => {
                if(scroll == true){
                  autoscroll()
                }else{return}
            }, 5000);

               
            return{
                scrolledleft: false,
                scrolledright: true,
                container: document.querySelector('#recentcontainer'),
                innneritem:document.querySelector('#inneritem'),
                getviewPortWidth: function(){
                  let intViewportWidth = window.innerWidth;
                  let scrollamout = 0;
                  if(intViewportWidth <= 700){
                    scrollamout = 200;
                  }else if(intViewportWidth > 700 && intViewportWidth <= 900 ){
                      scrollamout = 300;
                  }
                  else if(intViewportWidth > 900){
                    scrollamout = 600;
                  }
                  return scrollamout;
                      
                },
                getscrolledamount: function(){
                    this.container.scrollLeft > 0 ? this.scrolledleft=true : this.scrolledleft=false;
                    this.container.scrollWidth == this.container.scrollLeft + this.container.getBoundingClientRect().width ? this.scrolledright = false : this.scrolledright = true;
                  

                },

                
                scrolltoLeft: function(){
                 
                    
                  
                      this.container.scrollBy({left: -(this.getviewPortWidth()), behavior: 'smooth'
                      })
                     

                     

                },
                scrolltoRight: function(){
                      
                 
                      this.container.scrollBy({left: this.getviewPortWidth(), behavior: 'smooth'
                      })
                      
                    
                }





            }


    }


</script>

<script>

    
  function select() {
    return {
   
      open: false,
      
      closeListbox: function () {
        this.open = false;
      
      },
  
      toggleListboxVisibility: function () {
        if (this.open) return this.closeListbox();     
        this.open = true;
 
  }
      }
      
    };
  
  
  </script>

  






</html>