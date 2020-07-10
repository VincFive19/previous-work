//
//  boardGameClass.swift
//  Tomaa assignment 1 milestone 1
//
//  Created by Tomas Heligr-Pyke on 10/3/20.
//  Copyright © 2020 griffith. All rights reserved.
//



import Foundation
import UIKit
import CoreData



/// Board Game Class allows creation of board game object
public class BoardGame: ObservableObject {
    @Published var name: String?
    @Published var subtitle: String?
    @Published var description: String?
    @Published var image: UIImage
    @Published var pro: String?
    @Published var con: String?
    @Published var notes: String?
    
    
    init(_ name: String, _ subtitle: String, _ description: String, _ image: UIImage, _ pro: String, _ con: String, _ notes: String) {
        self.name = name
        self.subtitle = subtitle
        self.description = description
        self.image = image
        self.pro = pro
        self.con = con
        self.notes = notes
    }
   
}


/// BoardGameJSONTEST Class
public class BoardGameJSONTEST: Codable, ObservableObject {
    var name: String?
    var subtitle: String?
    var description: String?
    var image: String?
    var pro: String?
    var con: String?
    var notes: String?
    var locationTitle: String?
    var longitude: Double
    var latitude: Double
    
    
    init(_ name: String, _ subtitle: String, _ description: String, _ image: String, _ pro: String, _ con: String, _ notes: String, _ locationTitle: String, _ longitude: Double, _ latitude: Double) {
        self.name = name
        self.subtitle = subtitle
        self.description = description
        self.image = image
        self.pro = pro
        self.con = con
        self.notes = notes
        self.locationTitle = locationTitle
        self.longitude = longitude
        self.latitude = latitude
    }
   
}

//public class BoardGameJson: Codable {
//    var name: String
//        var subtitle: String
//        var description: String
//        var image: String
//        var pro: String
//        var con: String
//        var notes: String
//}


