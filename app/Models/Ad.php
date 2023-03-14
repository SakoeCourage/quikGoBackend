<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\subcategories;
use App\Models\Location;
use Overtrue\LaravelLike\Traits\Likeable;



class Ad extends Model
{
    use HasFactory;
    use Sluggable;
    use Likeable;


   protected $guarded=['id'];
   

   public function user(){
    return($this->belongsTo(User::class));

   }
   public function location(){
       return($this->belongsTo(Location::class));
   }
   public function category(){
       return($this->belongsTo(Category::class));
   }
   public function subcategory(){
        return($this->belongsTo(\App\Models\subcategories::class));
}

   public function sluggable(): array
   {
       return [
           'slug' => [
               'source' => 'item_name'
           ]
       ];
   }

   public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search){
                        $query->where('item_name', 'Like', '%' . $search . '%')
                        
                        ;
        }) ;
        $query->when($filters['subcategory'] ?? false, function($query, $subcategory){
                 $query->where('subcategory_id',$subcategory )
            
            ;
            }) ;
        $query->when($filters['condition'] ?? false, function($query, $condition){
                 $query->where('condition',$condition )
            
            ;
            }) ;



        $query->when($filters['category'] ?? false, function($query,$category){
                    $query->whereHas('category',function($query) use($category){
                                
                     $category_id = Category::where('category', $category)->pluck('id')->firstorFail();
                       
                        
                        
                        if($category_id == '1' ){
                            return $query;
                        }else{
                            $query->where('category_id', $category_id);
                        }
                    }


                    );
                       
                        
                        

        });
        $query->when($filters['location'] ?? false, function($query,$location){
                $query->whereHas('location',function($query) use($location){


                    $location_id = Location::where('location', $location)->pluck('id')->firstorFail();
         
            
                    
                    if($location_id == '1' ){
                        return $query;
                    }else{
                        $query->where('location_id', $location_id);
                    }

                });
            
            

});

$query->when($filters['price'] ?? false, function($query, $price){
                       
            if ($price === "low to high") {
                    $query->orderBy('price', 'asc');
                } else {
                    $query->orderBy('price', 'desc');
                };
            
                
            
    
    

});
$query->when($filters['order'] ?? false, function($query, $order){
                       
    if ($order === "recent") {
            $query->orderBy('created_at', 'desc');
        } else {
            $query->orderBy('created_at', 'asc');
        };
    
        
    



});

   }

   static function related_ads($ad,$cat_id){
        $query = Ad::query();
           
        
       $query = Ad::where('item_name', 'Like', '%' . strtolower($ad) . '%')->get();
       if($query->count() < 10){
            $query_category = Ad::where('category_id',$cat_id)->limit(10)->get();
            
            $query = $query->merge($query_category);

       }
        
    


       return $query; 


   }

   



}
    