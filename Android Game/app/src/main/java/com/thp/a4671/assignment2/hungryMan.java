package com.thp.a4671.assignment2;

import android.util.Log;
import android.widget.Button;

import java.util.ArrayList;
import java.util.Random;

public class hungryMan {

    // variables of properties

    int x;
    int y;
    int health;
    int speed;

    // methods

    public hungryMan(Button man, int width) {
        // init everything

        x = new Random().nextInt(width);
        y = 0;
        health = 3;
        speed = 10;

        man.setX(x);
        man.setY(y);

    }

    public float[] collisionBox(Button hungryManButton) {
        float xLow = hungryManButton.getX();
        float xHigh = hungryManButton.getX() + 40;
        float yLow = hungryManButton.getY();
        float yHigh = hungryManButton.getY() + 40;

        float[] rectCollision = {xLow, xHigh, yLow, yHigh};

        return rectCollision;
    }

    public void moveDown(int height, Button hungryManButton, int width) {
        speed += 0.5;
        float currentPosition = hungryManButton.getY();
        float moveDown = currentPosition + speed;
        hungryManButton.setY(moveDown);

        Log.d("Test", "Value: " + Float.toString(height) + "Move Down" +Float.toString(moveDown) );

        if (moveDown >= height) {
            hungryManButton.setY(0);
            hungryManButton.setX(new Random().nextInt(width));
        }
    }

}
