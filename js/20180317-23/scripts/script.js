window.onload = function(){ (function(){

var counter = 0,
$items = document.querySelectorAll('.content_1 figure'),
numItems = $items.length;

var showCurrent = function(){
var itemToShow = Math.abs(counter % numItems);

[].forEach.call( $items, function(el){
el.classList.remove('show');
});

$items[itemToShow].classList.add('show');
};

document.getElementById('next').addEventListener('click', function() {
counter++;
showCurrent();
},
false);

document.getElementById('prev').addEventListener('click', function() {
counter--;
showCurrent();
},
false);

})()};
