//
//  boardGameClass.swift
//  Tomaa assignment 1 milestone 1
//
//  Created by Tomas Heligr-Pyke on 10/3/20.
//  Copyright © 2020 griffith. All rights reserved.
//



import Foundation
import UIKit


// Board Game Class allows creation of board game object
public class BoardGame: ObservableObject {
    @Published var name: String
    @Published var subtitle: String
    @Published var description: String
    @Published var image: UIImage
    @Published var pro: String
    @Published var con: String
    @Published var notes: String
    
    
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


let initialImage = UIImage(named: "test")

// Add to array function
func add() {
    BoardGameArray().boardGames
    .insert(boardGameInitial, at: 0)
}


// Initial value class, for creation of new array members
public class BoardGameSingleInitial: ObservableObject, Identifiable {
    @Published var boardGameInitial: BoardGame = BoardGame("test","test","test", initialImage!,"test","test","test")
}


// Creates inidital array
public class BoardGameArray: ObservableObject, Identifiable {
    
    
    
    @Published var boardGames: [BoardGame] = [BoardGame("test","test","test",initialImage!,"test","test","test"), BoardGame("test","test","test",initialImage!,"test","test","test"),BoardGame("test","test","test",initialImage!,"test","test","test")]
    
//    init() {
//        self.boardGames = [BoardGame("test","test","test","test","test","test","test"), BoardGame("test","test","test","test","test","test","test"),BoardGame("test","test","test","test","test","test","test")]
//    }
}

//public class boardGamesStruct: ObservableObject, Identifiable {
//    
//    @Published var boardGames = [BoardGame]()
//    
//    func addElement() {
//        let boardGame = BoardGame("test","test","test","test","test","test","test")
//        boardGames.append(boardGame)
//    }
//    func remove(_ indices: IndexSet)  {
//        indices.forEach { boardGames.remove(at: $0) }
//    }
//    
//   
////
////    =  [BoardGame("test","test","test","test","test","test","test"), BoardGame("test","test","test","test","test","test","test"),BoardGame("test","test","test","test","test","test","test")]
//        
//        
//       
//    }

