//
//  masterView.swift
//  Tomaa assignment 1 milestone 1
//
//  Created by Tomas Heligr-Pyke on 11/3/20.
//  Copyright © 2020 griffith. All rights reserved.
//

import SwiftUI

struct masterView: View {
    
    
    
    
//     var boardGame1 = BoardGame("Jenga", "Jenga for Jengaring", "Jenga is a fun tower stacking board game", "jenga", "fun", "Topples")
//    var boardGame2 = BoardGame("Monopoly", "Capatilsm in Game Form", "Test", "Test", "Test", "Test")
//    var boardGame3 = BoardGame("Ticket to Ride", "fdhdf", "gdfg", "sdg", "sfg", "sf")
//
//    
    
    var boardGameArray = [BoardGame("Jenga", "Jenga for Jengaring", "Jenga is a fun tower stacking board game", "jenga", "fun", "Topples"),
        BoardGame("Monopoly", "Capatilsm in Game Form", "Test", "Test", "Test", "Test"),
        BoardGame("Ticket to Ride", "fdhdf", "gdfg", "sdg", "sfg", "sf")]
    
    
    
    var body: some View {
        
        NavigationView {
//            for game in boardGameArray {
//                Text("Test")
//            }
            Form {
                ForEach(0..<boardGameArray.count) { number in
//                    Text("Row \(number)")
//                    Text("\(self.boardGameArray[number].name)")
                    
                    
                    
//                    NavigationLink(destination: ContentView(boardGame: BoardGame)) {
//                        
//                    }
                    HStack(){
                        Image(self.boardGameArray[number].image)
                            .resizable()
                            .aspectRatio(contentMode: .fit)
                        Spacer()
                                VStack(alignment: .leading) {
                                    Text("\(self.boardGameArray[number].name)")
                                        .bold()
                                    Text("\(self.boardGameArray[number].subtitle)")



                                }
                            }
                    
                    
                    
                }
            }
            
            
            
            
            List {
//                ForEach(0..<boardGameArray.count) { i in NavigationLink(destination: ContentView(boardGame: boardGameArray[i]) {
                    HStack(){
                                Image(systemName: "cloud.heavyrain.fill")
                                VStack(alignment: .leading) {
                                    Text("The Mega Jenga")
                                        .bold()
                                    Text("It is very megery")
                    
                                    Text("- It is big")
                    
                    
                                }
                            }
                    }
                    
                
                
            
        }.navigationBarTitle("List")
    }
    
}

struct masterView_Previews: PreviewProvider {
    static var previews: some View {
        masterView()
    }
}
