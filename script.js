document.addEventListener('DOMContentLoaded', function() {
    let carousel1 = document.getElementById('carousel1');
    let carousel2 = document.getElementById('carousel2');
    let items1 = carousel1.getElementsByClassName('carousel-item');
    let images2 = carousel2.getElementsByTagName('img');
    let index1 = 0;
    let index2 = 0;

    function showNextItem(items, index) {
        items[index].classList.remove('active');
        index = (index + 1) % items.length;
        items[index].classList.add('active');
        return index;
    }

    function showNextImage(images, index) {
        images[index].classList.remove('active');
        index = (index + 1) % images.length;
        images[index].classList.add('active');
        return index;
    }

    items1[index1].classList.add('active');
    images2[index2].classList.add('active');

    setInterval(function() {
        index1 = showNextItem(items1, index1);
        index2 = showNextImage(images2, index2);
    }, 4000);
}
);
