const container = document.getElementById("sliding-container");

//Array of images
const images = [
	
];

let currentIndex = 0;

function createSlidingImage()
{
	const image=document.createElement("img");
	const randomImage=images[Math.floor(math.random() * imageUrls.length)];
	image.src = randomImage;
	image.classList.add("sliding-image");
	container.appendChild(image);
	
	setTimeout()=>{
		image.style.transform="translateX(calc(100%+100px))"
	}
	
	//Remove the image when done
	image.addEventListener("transitioned", () => {
		container.remove.Childe(image);
		currentIndex= (currentIndex +1) % images.length;
		createSlidingImage();
	});
}

createSlidingImage();