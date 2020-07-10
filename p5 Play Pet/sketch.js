let button = new Array(3);
let buttonText = new Array(3);
let buttonFill = new Array(3);
let petsMenu = new Array(10);
let petCircle = new Array(10);
let circle = new Array(10);
let animationChosens = new Array(10);
let petMenuColour = new Array(10);

const MENU = 0;
const SETTINGS = 1;
const GAME = 2;
var currentState = MENU;

let groom;
let feed;
let play;

let happy;
let nuetral;
let angry;
let bg;

let total;
let circles;
let petsMenus;
let petCircles;

let pets;

let petColourSlider;
let petColour;


let gamePet;
let face;

let spriteSheetHappy;
let spriteSheetAngry;
let spriteSheetNuetral;

let happyAnimation;
let neutralAnimation;
let angryAnimation;

let colour;

let petAnimationatTime;

let names;

let word;


function preload() {
	//images
    happy = loadImage("images/happy.png");
    nuetral = loadImage("images/nuetral.png");
    angry = loadImage("images/angry.png");
    bg = loadImage("images/bg.jpg");
	
	//Important External Files e.g. json and txt
    pets = loadJSON('pet.json');
	names = loadStrings('names.txt');
	logoVideo = createVideo('images/logo.mp4');
	
	//Animations
	happyAnimation = loadAnimation("images/1.png", "images/6.png");
	neutralAnimation = loadAnimation("images/13.png", "images/18.png");
	angryAnimation = loadAnimation("images/7.png", "images/12.png");
	armAnimation = loadAnimation("images/arm1.png", "images/arm29.png");

    //Colour Mode Change
    colorMode(HSB);
	
	
};

function setup() {
    createCanvas(500, 500);
	
	colorMode(HSB);

	
	
    word = random(names);
    
	
	groom = random(100);
    feed = random(100);
    play = random(100);
    
	
	//Plays the video, loops it, and hides it from the HTML Page
	logoVideo.loop();
	logoVideo.hide();

	//GUI
	//Play GUI
    playButton = createButton('Play');
    playButton.position(250 - playButton.size().width / 2, 300);
    playButton.mouseClicked(playButtonClicked);
    
	//Settings GUI
    settingsButton = createButton('Settings');
    settingsButton.position(250 - settingsButton.size().width / 2, 350);
    settingsButton.mouseClicked(settingsButtonClicked);
    
	//Menu GUI
    menuButton = createButton('Menu');
    menuButton.position(250 - menuButton.size().width / 2, 350);
    menuButton.mouseClicked(menuButtonClicked);
    menuButton.hide();
    
	//Pet Colour Slider GUI
    petColourSlider = createSlider(0, 255, 100);
    petColourSlider.position(300, 300);
    petColourSlider.style('width', '80px');
    petColourSlider.hide();
    
	
	//Assigns animations from JSON to a variable
	for(var i=0; i<10; i++) {
		animationChosens[i] = pets.features[i].animationChosen;
  	};

	//Groups the three Sprites
    circles = new Group();
	petCircles = new Group();
	petsMenus = new Group();
	
	//for creation of Sprites
	//Sprite group 1
    for(var i=0; i<10; i++) {
        circle[i] = createSprite(random(1, width), random(1, height));
        circle[i].setCollider('circle', -2, 2, 50);
        circle[i].setSpeed(pets.features[i].circleSpeed, random(0, 360));
        circle[i].scale = pets.features[i].petScale;
        circles.add(circle[i]);
		circle[i].draw = function() {
			colorMode(HSB);
			ellipse(0, 0, 100, 100);
		};	
	};
	//Sprite group 2
	for(var i=0; i<10; i++) {
        petCircle[i] = createSprite(random(1, width), random(1, height));
        petCircle[i].setCollider('circle', -2, 2, 50);
        petCircle[i].scale = pets.features[i].petScale;
        petCircle[i].setSpeed(pets.features[i].circleSpeed, random(0, 360));
        petCircles.add(petCircle[i]);
		petCircle[i].draw = function() {
			colorMode(HSB);
			ellipse(0, 0, 100, 100);
		};
  	};
	//Sprite group 3
 	for(var i=0; i<10; i++) {
       	petsMenu[i] = createSprite(random(1, width), random(1, height));
    	petsMenu[i].setCollider('circle', -2, 2, 50);
        petsMenu[i].scale = pets.features[i].petScale;
        petsMenu[i].setSpeed(pets.features[i].circleSpeed, random(0, 360));
       	petsMenus.add(petsMenu[i]);
		petsMenu[i].draw = function() {
			colorMode(HSB);
            ellipse(0, 0, 100, 100);
		}; 
  	};
	
	//Game Pet Sprite creation
	gamePet = createSprite(width / 2, height / 2, 10, 10);
	gamePet.setCollider('circle', -2, 2, 50);
};
	

function draw() {
	//To control pet colour	
	let petColour = petColourSlider.value();
	
	//To Control Game Pet
	gamePet.draw = function() {
		colorMode(HSB);
    	fill(petColour, 100, 80);
		push();
    	ellipse(0, 0, 100, 100);
		pop();
		scale(0.06);
		if (groom < 30 || feed < 30 || play < 30) {
        	animation(angryAnimation, 0, 0);
		} else {
			if (groom < 60 || feed < 60 || play < 60) {
            	animation(neutralAnimation, 0, 0);
            } else {
                animation(happyAnimation, 0, 0);
            };
    	};
		animation(armAnimation, -1300, 0);
  	};
	
	//Different Screens Control
    switch (currentState) {
		case MENU:
			drawMenu();
			break;
		case SETTINGS:
			drawSettings();
			break;
		
		case GAME:
			drawGame();
			break;
	};
    
	//Collisions Contorl
	collisions();

};



//Draw Functions
function drawMenu() {
	image(bg, 0, 0, 500, 500);
    filter(POSTERIZE, 3);
	textSize(29);
    textAlign(CENTER);
    textStyle(BOLD);
    textFont('Georgia');
    fill('white');
    text('VIRTUAL PET: THE GAME!', width / 2, 200);
};

function drawSettings() {
	background(0);
    image(logoVideo, -70, 20);
    textSize(20);
    textAlign(CENTER);
    textStyle(BOLD);
    textFont('Georgia');
    fill(150, 150, 150);
    text("Pet's Colour", 200, 320);
    drawSprite(gamePet);
};

function drawGame() {
    dataChange();
    background(total, 100, 100);
	textSize(20);
    textAlign(CENTER);
    textStyle(BOLD);
    textFont('Georgia');
	backgroundCircles();
    fill('white');
    text(word, width / 2, 320);
	
    drawSprite(gamePet);
	animationsForSprites();
};

//Background Sprites
function backgroundCircles() {
	fill(play, 100, 255);
    drawSprites(circles);
    fill(feed, 100, 255);
    drawSprites(petsMenus);
    fill(groom, 100, 255);
    drawSprites(petCircles);
};



//Button Areas
function playButtonClicked() {
    currentState = GAME;
    playButton.hide();
    settingsButton.hide();
    petColourSlider.hide();
	menuButton.show();
};

function settingsButtonClicked() {
    currentState = SETTINGS;
    playButton.hide();
	settingsButton.hide();
    petColourSlider.show();
    menuButton.show();
};

function menuButtonClicked() {
    currentState = MENU
    playButton.show();
    settingsButton.show();
    petColourSlider.hide();
    menuButton.hide();

};

//Collisions
function collisions() {
	circles.bounce(circles);
	circles.bounce(petsMenus);
	circles.bounce(petCircles);
	petsMenus.displace(petsMenus);
  	petsMenus.displace(circles);
  	petsMenus.displace(petCircles);
	
  	petCircles.displace(petsMenus);
  	petCircles.displace(circles);
  	petCircles.displace(petCircles);
	
	gamePet.displace(circles);
  	gamePet.displace(petsMenus);
  	gamePet.displace(petCircles);
	
	//all sprites bounce at the screen edges
	for(var i=0; i<allSprites.length; i++) {
    	var s = allSprites[i];
    	if(s.position.x<0) {
      		s.position.x = 1;
      		s.velocity.x = abs(s.velocity.x);
    	}
    	if(s.position.x>width) {
      		s.position.x = width-1;
      		s.velocity.x = -abs(s.velocity.x);
    	}
    	if(s.position.y<0) {
      		s.position.y = 1;
      		s.velocity.y = abs(s.velocity.y);
   		}
   		if(s.position.y>height) {
      		s.position.y = height-1;
      		s.velocity.y = -abs(s.velocity.y);
   		};
  	};
};

//Sprite Background Animations
function animationsForSprites() {
	scale(0.04);
    for(var i=0; i < petsMenu.length; i++) {
		if (animationChosens[i] == 0) {
            animation(angryAnimation, petsMenu[i].position.x / 0.04, petsMenu[i].position.y / 0.04);
            animation(angryAnimation, petCircles[i].position.x / 0.04, petCircles[i].position.y / 0.04);
            animation(angryAnimation, circle[i].position.x / 0.04, circle[i].position.y / 0.04);
		} else {
			if (animationChosens[i] == 1) {
				animation(neutralAnimation, petsMenu[i].position.x / 0.04, petsMenu[i].position.y / 0.04);
                animation(neutralAnimation, petCircles[i].position.x / 0.04, petCircles[i].position.y / 0.04);
                animation(neutralAnimation, circle[i].position.x / 0.04, circle[i].position.y / 0.04);
        	} else {
				animation(happyAnimation, petsMenu[i].position.x / 0.04, petsMenu[i].position.y / 0.04);
                animation(happyAnimation, petCircles[i].position.x / 0.04, petCircles[i].position.y / 0.04);
                animation(happyAnimation, circle[i].position.x / 0.04, circle[i].position.y / 0.04);
            };
		};
    };
};

//Data change control
function dataChange() {
	groom -= 0.2;
    feed -= 0.2;
    play -= 0.2;
    total = (groom + feed + play) - 100;
};

//key pressed function
function keyPressed() {
    if(keyCode == RIGHT_ARROW) {
        play = 100;
    };
    if(keyCode == UP_ARROW) {
        feed = 100;
    };
    if(keyCode == LEFT_ARROW) {
        groom = 100;
    };
};