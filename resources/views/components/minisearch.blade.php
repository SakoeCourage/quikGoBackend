{{-- i want to return a route with current query string --}}


<div  x-data="searchroute()" x-init=" searchItem = setCurrentSearch()" action="/ads"   class=" rounded-lg relative border-2 border-gray-300 w-full h-9 text-gray-600   flex items-center md:h-9 m lg:w-1/2 lg:h-auto">
    <input x-model="searchItem"  @keyup.enter="setNewURL()" class="rounded-lg  h-full w-full px-5 pr-16 text-sm focus:outline-none focus:shadow-outline-orange focus:border-orange-300"
      type="search" name="search"  placeholder="Search" value="{{ request('search') ?? null }}">
    <button @click="setNewURL()" class="absolute right-0 top-0 px-2 mr-4  h-full grid place-items-center focus:outline-none ">
      <svg class="text-orange-200 h-4 w-4 fill-current hover:text-orange-400" xmlns="http://www.w3.org/2000/svg"
        
        viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
        width="512px" height="512px">
        <path
          d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
      </svg>
    </button>
  </div>
<script>
  searchroute = function(){
        return{
              currentURL : window.location.href,
              newURL : null,
              searchItem: null,
              navigate: function(){
                window.location = this.newURL.toString()
              },
              setNewURL: function(){
                var href = new URL(this.currentURL);
                href.searchParams.set('search', this.searchItem);
               this.newURL = href;
               this.navigate();
              
              
                
              }
              ,setCurrentSearch:function(){
                
                var href = new URL(this.currentURL);
                var search = href.searchParams.get('search');
               
                return search;

              }
          







        }



  }
  
  </script>