let b = Math.floor(Math.random()*15)+1
let thumbOne
let photoAmount = 10
let API_KEY = "api_key=dc140afe3fd3a251c2fdf9dcd835be5c"; 
let requestStr= "https://api.flickr.com/services/rest/?method=flickr.photos.search&" + API_KEY + "&tags=" + "Australia" + "&per_page=" + photoAmount + "&has_geo" + "&format=json&nojsoncallback=1";
   
let list = $("li")

let images = []
let nrequest
let nrecieved

let maxlat = -11.415849;
let minlat = -43.645299;
let maxlon = 154.465136;
let minlon = 110.394105;

//clear page
$("#container").html("");

//initial images
$.get(requestStr, function(data){ 
    fetchPhoto(data); 
});
       
       

  
//fetch photo function
function fetchPhoto(data){ 
    images.length = 0;
    $("#container").html("");
        
    nrequest = 10;
    nrecieved = 0;
    for (let i = 0; i < photoAmount; i++){
       
        var photoObj = {};
       
        photoObj.photoid = data.photos.photo[i].id; 
        photoObj.title = data.photos.photo[i].title;
        photoObj.photoNum = i;
        
        getSizes(photoObj);

    };
};


//gets input of li elements, links to flickr photo link
$("li").each(function(index){
    $(this).click(function(){ 
        let text = $(this).text()
            
        let location = "https://api.flickr.com/services/rest/?method=flickr.photos.search&" + API_KEY +"&tags=" + text + "&per_page=20&format=json&nojsoncallback=1";
        $.get(location, function(data){
            fetchPhoto(data);
        });
    });
});
 
//gets click of Australia button, also links to flickr photo link using longitude lat data (bbox)
$("#AustraliaButton").each(function(index){
    $(this).click(function(){ 
        let pageNum = Math.floor(Math.random()*300)+1;
        let Australia = "https://api.flickr.com/services/rest/?method=flickr.photos.search&" + API_KEY + "&bbox=" + minlon + "," + minlat + "," + maxlon + "," + maxlat + "&page=" + pageNum + "&per_page=10&format=json&nojsoncallback=1";
        
        $.get(Australia, function(data){
            fetchPhoto(data);
        });
    });
});
    
//get sizes function - gets the sizes of the images
function getSizes(photoObj){ 
    let getSizesStr = "https://api.flickr.com/services/rest/?method=flickr.photos.getSizes&format=json&nojsoncallback=1&" + API_KEY + "&photo_id=" + photoObj.photoid;  
    
    $.get(getSizesStr, function(data){
         
        photoObj.thumb = data.sizes.size[5].source;
        photoObj.bigThumb = data.sizes.size[data.sizes.size.length-1].source;
        photoObj.smallThumb = data.sizes.size[0].source;
            
        nrecieved++;
        images.push(photoObj);
        
        if (nrecieved  == nrequest){
            display(images);
        }
    }
)};
    
//gets data for recently viewed photo, appends it, and deletes the last one if over 5
function recentlyViewed(small, thumb, large, title){
    $('#recentlyViewedContainer').prepend(`<div id="clickImage" class="smallImage" name="thumb" data-small="${small}" data-full="${large}" data-title="${title}" data-small="${small}"><img class="image-size-small" src="${small}"></img><div class="overflow"></div></div>`);
   
    if($('.smallImage').length > 5 ) {
        $('#recentlyViewedContainer .smallImage').last().remove();
    };
    
    $('.smallImage').each(function(index){
        $(this).click(function(){ 
            $('#modal-container').css('display', 'block');
            $('#modal-content').attr('src', $(this).attr('data-full'));
            $('#modal-caption').text($(this).attr('data-title'));
        });
    });  
};


//displays the photos, also checks if photo has been clicked
function display(photoObj) {
    for (let i = 0; i < photoAmount; i++){
        $("#container").append(`<div id="clickImage" class="images" name="thumb" data-thumb="${photoObj[i].thumb}" data-full="${photoObj[i].bigThumb}" data-title="${photoObj[i].title}" data-small="${photoObj[i].smallThumb}"><img class="image-size" src="${photoObj[i].thumb}"></img><div class="overflow"><fig-caption class="paragraph-margin">${photoObj[i].title}</fig-caption></div></div>`);
    }
    
    $('#modal-close').click(function(){
        $('#modal-container').css('display', 'none');
        $('#modal-content').attr('src', $(this).attr('data-full'));
    }); 
        
    $('.images').each(function(index){
        $(this).click(function(){ 
            $('#modal-container').css('display', 'block');
            $('#modal-content').attr('src', $(this).attr('data-full'));
            $('#modal-caption').text($(this).attr('data-title'));
            recentlyViewed($(this).attr('data-small'), $(this).attr('data-thumb'), $(this).attr('data-full'), $(this).attr('data-title'));
        });
    });  
};