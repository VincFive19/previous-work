//
//  ContentView.swift
//  Tomaa assignment 1 milestone 1
//
//  Created by Ashley McKay on 2/3/20.
//  Copyright © 2020 griffith. All rights reserved.
//

import SwiftUI


struct ContentView: View {
    
//    var boardGame = BoardGame("Jenga", "Jenga for Jengaring", "Jenga is a fun tower stacking board game", "jenga", "fun", "Topples")

    
    var boardGameChosen: BoardGame?
//    var boardGame = boardGameChosen
    
    var body: some View {
        
        
        

        
        
//        Navigation List
//        NavigationView {
//            List {
//                HStack(){
//                    Image(systemName: "cloud.heavyrain.fill")
//                    VStack(alignment: .leading) {
//                        Text("The Mega Jenga")
//                            .bold()
//                        Text("It is very megery")
//
//                        Text("- It is big")
//
//
//                    }
//                }
//            }
//        }.navigationBarTitle("List")
        
//        Temp Variables
        
        
//        Detailed View
//        NavigationView {
                        
            
            
            VStack(alignment: .leading) {
                
//                Image("\(boardGameChosen?.image ?? "test")")
//                    .resizable()
//                    .aspectRatio(contentMode: .fit)'
                
                
//                    .edgesIgnoringSafeArea(.top)
                
                    
//                var image = #imageLiteral(resourceName: "jenga")
//                var chat = UIImage(named: "jenga")
//                var chatImageView = UIImageView(image: chat)
                Text("\(boardGameChosen?.name ?? "Unknown")").font(.title).multilineTextAlignment(.leading).padding(.horizontal).frame(width: nil)
                Text("\(boardGameChosen?.subtitle ?? "Unknownw")").font(.subheadline).fontWeight(.regular).multilineTextAlignment(.leading).padding(.horizontal)
                
                VStack(alignment: .leading) {
                    
                    HStack() {
                        Text("Description:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading)
//                        Text("\(boardGame.description)").font(.body).multilineTextAlignment(.leading)
                    }
                    HStack() {
                        Text("\(boardGameChosen?.description ?? "Unknown")").font(.subheadline).multilineTextAlignment(.leading)
                        
                        
                    }
                    HStack() {
                        Text("Pros:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading)
                    }
                    HStack() {
                        Text("\(boardGameChosen?.pro ?? "Unknown")").font(.subheadline).multilineTextAlignment(.leading)
                    }
                    HStack() {
                        Text("Cons:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading)
                    }
                    HStack() {
                        Text("\(boardGameChosen?.con ?? "Unknown")").font(.subheadline).multilineTextAlignment(.leading)
                    }
                    
                
                    
                }
                .padding([.top, .leading, .trailing])
                
                Spacer()
                
            }
            
            
            
        }
    
        
//        HStack(){
        
        
//        }
//    }
}

struct ContentView_Previews: PreviewProvider {
    static var previews: some View {
        ContentView()
    }
}
