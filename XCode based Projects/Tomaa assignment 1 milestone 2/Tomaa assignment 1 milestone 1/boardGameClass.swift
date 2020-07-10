//
//  boardGameClass.swift
//  Tomaa assignment 1 milestone 1
//
//  Created by Tomas Heligr-Pyke on 10/3/20.
//  Copyright © 2020 griffith. All rights reserved.
//

import Foundation


class BoardGame {
    var name: String
    var subtitle: String
    var description: String
    var image: String
    var pro: String
    var con: String
    
    
    init(_ name: String, _ subtitle: String, _ description: String, _ image: String, _ pro: String, _ con: String) {
        self.name = name
        self.subtitle = subtitle
        self.description = description
        self.image = image
        self.pro = pro
        self.con = con
    }
}
