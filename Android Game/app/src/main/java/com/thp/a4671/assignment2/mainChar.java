package com.thp.a4671.assignment2;

import android.widget.Button;

public class mainChar {
    // variables of properties

    int x;
    int y;
    int health;

    // methods

    public mainChar() {
        // init everything

        x = 10;
        y = 10;
        health = 3;

    }

    public float[] collisionBox(Button mainCharButton) {
        float xLow = mainCharButton.getX();
        float xHigh = mainCharButton.getX() + 30;
        float yLow = mainCharButton.getY();
        float yHigh = mainCharButton.getY() + 30;

        float[] rectCollision = {xLow, xHigh, yLow, yHigh};

        return rectCollision;
    }

    public void moveLeft(Button mainCharButton) {
        float currentPosition = mainCharButton.getX();
        float moveLeft = currentPosition - 10;
        mainCharButton.setX(moveLeft);
    }

    public void moveRight(Button mainCharButton) {
        float currentPosition = mainCharButton.getX();
        float moveRight = currentPosition + 10;
        mainCharButton.setX(moveRight);
    }

}
