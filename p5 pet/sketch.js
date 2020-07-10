let button = new Array(3);
let buttonText = new Array(3);
let buttonFill = new Array(3);
let groom;
let feed;
let play;
let r;
let r1;
let r2;
let happy;
let nuetral;
let angry;
let bg;
let rx;
let ry;
let colourful;
let total;

function preload() {
    happy = loadImage("images/happy.png");
    nuetral = loadImage("images/nuetral.png");
    angry = loadImage("images/angry.png");
    bg = loadImage("images/bg.jpg");
}

function setup() {
    createCanvas(500, 500);
    buttonText = ["Groom", "Feed", "Play"];
    
    r = random(255);
    r1 = random(255);
    r2 = random(50, 150);
    
    groom = random(100);
    feed = random(100);
    play = random(100);
    
    colorMode(HSB);
}

function draw() {
    background(200);
    
    image(bg, 0, 0, 500, 500);
    
    fill(r, r1, r2);
    rect(150, 50, 200, 250);    
    rx = random(140, 160);
    ry = random(40, 60);
    
    if (mouseX > 150 && mouseX < 350 && mouseY > 50 && mouseY < 300) {
    rect(rx, ry, 200, 250);
    }

    
    
    for (let i = 0; i < 3; i++){
        fill(150, 255, 255);
	 	ellipse(i * 150 + 100, 400, 150, 150);
	 }
    
    for (let i = 0; i < 3; i++){
        fill(200, 150, 30);
        textSize(20);
        textStyle(BOLD);
        textFont('Georgia');
	 	text(buttonText[i], i * 150 + 70, 400);
	 }

    if (groom < 30 || feed < 30 || play < 30) {
        image(angry, 150, 50, 200, 130);
        
    } else {
        if (groom < 60 || feed < 60 || play < 60) {
            image(nuetral, 150, 50, 200, 130);
            } else {
                image(happy, 150, 50, 200, 130);
            }
    }
     
    fill(groom, 100, 255);
    rect(50, 405, 100, 20);
    
    fill(feed, 100, 255);
    rect(200, 405, 100, 20);
    
    fill(play, 100, 255);
    rect(350, 405, 100, 20);

    colourful = random(0, 255);
    
    total = (groom - feed - play) + 100;
   
    fill(colourful, 100, 255);
    translate(width / 2, 240);
    rotate(frameCount / total);
    triangle(0, 0, 0, 50, 50, 0);
    
    groom -= 0.2;
    feed -= 0.2;
    play -= 0.2;
}

function keyPressed() {
    if(keyCode == RIGHT_ARROW) {
        play = 100;
    }
    if(keyCode == UP_ARROW) {
        feed = 100;
    }
    if(keyCode == LEFT_ARROW) {
        groom = 100;
    }
}