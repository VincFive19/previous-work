package com.thp.a4671.assignment2;

import androidx.appcompat.app.AppCompatActivity;

import android.graphics.Color;
import android.graphics.Point;
import android.os.Bundle;
import android.util.Log;
import android.view.Display;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import android.media.MediaPlayer;

import java.util.Timer;
import java.util.TimerTask;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        Display display = getWindowManager().getDefaultDisplay();
        Point size = new Point();
        display.getSize(size);
        final int width = size.x;
        final int height = size.y;

        Button leftClick = (Button) findViewById(R.id.leftClick);
        Button rightClick = (Button)  findViewById(R.id.rightClick);
        final Button hungryManButton = (Button) findViewById(R.id.hungryManButton);





//        TextView textElement;







        final mainChar mainChar = new mainChar();

        final hungryMan hungryMan = new hungryMan(hungryManButton, width);

        


        final Button mainCharButton = (Button) findViewById(R.id.mainChar);

        int startTime;


//        new Timer().scheduleAtFixedRate(new TimerTask(){
//            @Override
//            public void run(){
//
//
//
//            }
//        },0,500);

//        int time = 0;
//
//        timerText.setText(Integer.toString(time));

//        static void  int time
//        {
//            timerText.setText(Integer.toString(time));
//        };

        final MediaPlayer mp;

        mp = MediaPlayer.create(this, R.raw.sound);


        new Timer().scheduleAtFixedRate(new TimerTask(){
            @Override
            public void run(){

                hungryMan.moveDown(height, hungryManButton, width);

                float[] hungryManRectCol = hungryMan.collisionBox(hungryManButton);
                float[] mainCharRectCol = mainChar.collisionBox(mainCharButton);


//                xLow, xHigh, yLow, yHigh
//                if(hungryManRectCol[3] < mainCharRectCol[3]){
                if (hungryManRectCol[0] < mainCharRectCol[1] && hungryManRectCol[1] > mainCharRectCol[0] && hungryManRectCol[2] < mainCharRectCol[3] && hungryManRectCol[3] > mainCharRectCol[2]) {
//                    A.X1 < B.X2:
//                    true
//                    A.X2 > B.X1:
//                    false
//                    A.Y1 < B.Y2:
//                    true
//                    A.Y2 > B.Y1:

                    mp.start();

                }

//                if (hungryManRectCol[0] < mainCharRectCol[1] && hungryManRectCol[0] < mainCharRectCol[1] && hungryManRectCol[3] < mainCharRectCol[2] && hungryManRectCol[2] < mainCharRectCol[3]) {
//
//                    mp.start();
//
//                }


//                updateTimer(time);

//                ((TextView)findViewById(R.id.timer)).setText(Integer.toString(time));

            }
        },0, 100);




        leftClick.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                mainChar.moveLeft(mainCharButton);
            }

        });

        rightClick.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                mainChar.moveRight(mainCharButton);

            }

        });




    }
}


//To do,
// Create object of siple cultist
// reate big boi cultist
// small but fast
// etc


//Make main char dragable,
// make health
// make timer, and enemies random and moving yp down

/*
* create class hungryMan {
* speed:
* size:
* image:
* damage:
*}
*
*
* create megaMan : hungryMan {
*   speed: faster
*   size: bigger
*   }
*
* import button
*
* get button
*
* get location
*
* make dragable
*
* if badguy touches main char
*
* health -= 1
*
*
* spawn in badguy
*
* at random x, y off screen, with force down
*   moving down
*   tthis is set as timer
*
*
*
* */