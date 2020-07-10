//
//  ContentView.swift
//  Tomaa assignment 1 milestone 1
//
//  Created by Tomas heligr-Pyke on 2/3/20.
//  Copyright © 2020 griffith. All rights reserved.
//

import SwiftUI
import UIKit

struct ContentViewTwo: View {
    

    // ContentView State Variables.
    @State var boardGameChosen: BoardGameJSONTEST?
    @State var boardGame: Array<BoardGameJSONTEST>
//    var boardGame = boardGameChosen
    
    @State private var locationTitle: String = ""
    @State private var note: String = "Type Here"
    @State private var name: String = "Type Here"
    @State private var subtitle: String = "Type Here"
    @State private var description: String = "Type Here"
    @State private var pro: String = "Type Here"
    @State private var con: String = "Type Here"
    @State private var url: String = "Type Here"
    
    @State var initialName: String = "Name"
    
    
    
    // This intiialises the initial variables for all the states.
    init(boardGameChosen: BoardGameJSONTEST?, boardGame: Array<BoardGameJSONTEST>) {
//        _latitude = State(initialValue: boardGameChosen!.latitude )
        _note = State(initialValue: (boardGameChosen?.notes)!)
        _name = State(initialValue: (boardGameChosen?.name)!)
        _subtitle = State(initialValue: (boardGameChosen?.subtitle)!)
        _description = State(initialValue: (boardGameChosen?.description)!)
        _pro = State(initialValue: (boardGameChosen?.pro)!)
        _con = State(initialValue: (boardGameChosen?.con)!)
        _url = State(initialValue: (boardGameChosen?.image)!)
        _boardGameChosen = State(initialValue: boardGameChosen!)
        _boardGame = State(initialValue: boardGame)
        _locationTitle = State(initialValue: boardGameChosen!.locationTitle!)
        
        _initialName = State(initialValue: (boardGameChosen!.name)!)
    }
    
    
    
    var body: some View {

//        note = (boardGameChosen?.notes)!
//        name = (boardGameChosen?.name)!
//        subtitle = (boardGameChosen?.subtitle)!
//        description = (boardGameChosen?.description)!
//        pro = (boardGameChosen?.pro)!
//        con = (boardGameChosen?.con)!
//        url = (boardGameChosen?.image)!
//        locationTitle = (boardGameChosen?.locationTitle)!
//
        let initialName = boardGameChosen!.name!
        
        
            // View is set as a variable and then returned later on, in order to make sure it is called
        let view = NavigationView() {
            
            
            
            VStack() {
                

            Image(uiImage: image(url: (boardGameChosen?.image) ?? "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg")!)
                    .resizable()
                    .aspectRatio(contentMode: .fit)
                
//                    .edgesIgnoringSafeArea(.top)
                
                
                
                
                
                
//
                    
            
//following is grouped in order to fit more than 10 into a vstack, grouped into what they belong.
                // url title and subtitle
                Group{
                    HStack{
                    Text("Image URL:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading).padding(.leading)
            TextField("Enter your image URL", text: $url)
                .padding(.horizontal)
                    }
                    
                    // On commit the variables in the array get updated, then updates the core data with the initial name. Also on appear means that the view will get update each time it appears to keep data updated. In this case resets the variable to fit with the array
                    TextField("Enter your Title", text: $name, onCommit: {
//                        self.name = self.boardGameChosen?.name! as! String
                        self.boardGameChosen!.name! = self.name
                        
                        
                        updateCoreData(data: self.boardGameChosen!, initialName: self.initialName)
                    }).onAppear {
                        self.name = self.boardGameChosen!.name!
                    }
                .padding(.horizontal).font(.title)
//                Text("\(boardGameChosen?.name ?? "Unknown")")
//                    .font(.title)
            TextField("Enter your Subtitle", text: $subtitle, onCommit: {
            //                        self.name = self.boardGameChosen?.name! as! String
                                    self.boardGameChosen!.subtitle! = self.subtitle
                                    
                                    
                                    updateCoreData(data: self.boardGameChosen!, initialName: self.initialName)
                                }).onAppear {
                                    self.subtitle = self.boardGameChosen!.subtitle!
                                }
                .padding(.horizontal).font(.subheadline)
                    
//                Text("\(boardGameChosen?.subtitle ?? "Unknownw")").font(.subheadline).fontWeight(.regular)
                }

                    
//            Description
                Group{
                    HStack() {
                        Text("Description:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading).padding(.leading)

                        // On commit the variables in the array get updated, then updates the core data with the initial name. Also on appear means that the view will get update each time it appears to keep data updated. In this case resets the variable to fit with the array
                        TextField("Enter your Note", text: $description, onCommit: {
                        //                        self.name = self.boardGameChosen?.name! as! String
                                                self.boardGameChosen!.description! = self.description
                                                
                                                
                                                updateCoreData(data: self.boardGameChosen!, initialName: self.initialName)
                                            }).onAppear {
                                                self.description = self.boardGameChosen!.description!
                                            }
//
//                        Text("\(boardGameChosen?.description ?? "Unknown")").font(.subheadline).multilineTextAlignment(.leading).padding(.horizontal)
//
                        
                    }
                }
            
//            Pros
                Group{
                    HStack() {
                        Text("Pros:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading).padding(.leading)
//                    }
//                    HStack() {
                        // On commit the variables in the array get updated, then updates the core data with the initial name. Also on appear means that the view will get update each time it appears to keep data updated. In this case resets the variable to fit with the array
                TextField("Pro:", text: $pro, onCommit: {
                //                        self.name = self.boardGameChosen?.name! as! String
                                        self.boardGameChosen!.pro! = self.pro
                                        
                                        
                                        updateCoreData(data: self.boardGameChosen!, initialName: self.initialName)
                                    }).onAppear {
                                        self.pro = self.boardGameChosen!.pro!
                                    }

                    }
                }
            
            
//            Cons
                Group{
                    HStack() {
                        Text("Cons:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading).padding(.leading)
//                    }
//                    HStack() {\
                        // On commit the variables in the array get updated, then updates the core data with the initial name. Also on appear means that the view will get update each time it appears to keep data updated. In this case resets the variable to fit with the array
                        TextField("Enter your Note", text: $con, onCommit: {
                        //                        self.name = self.boardGameChosen?.name! as! String
                                                self.boardGameChosen!.con! = self.con
                                                
                                                
                                                updateCoreData(data: self.boardGameChosen!, initialName: self.initialName)
                                            }).onAppear {
                                                self.con = self.boardGameChosen!.con!
                                            }
 
            }
                }
//            Notes
                Group{
            HStack() {
                      Text("Notes:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading).padding(.leading)
                // On commit the variables in the array get updated, then updates the core data with the initial name. Also on appear means that the view will get update each time it appears to keep data updated. In this case resets the variable to fit with the array
                TextField("Enter your Note", text: $note, onCommit: {
                //                        self.name = self.boardGameChosen?.name! as! String
                                        self.boardGameChosen!.notes! = self.note
                                        
                                        
                                        updateCoreData(data: self.boardGameChosen!, initialName: self.initialName)
                                    }).onAppear {
                                        self.note = self.boardGameChosen!.notes!
                                    }
                    

                        
                
                }
                }
                
                Group{
                    HStack{
                        
                        // Links to the location view
                        Text("Location:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading).padding(.leading)
                        NavigationLink(destination: locationView(boardGameChosen: boardGameChosen)) {
                        Text("\(locationTitle)")
                        }
                    }.frame(alignment: .leading)
                
                    
                }
                
                
//                    }
            
            
            
//            }
            
//            HStack() {
//            NavigationLink(destination: locationView(boardGameChosen: self.boardGameChosen ))
//            {
//                    Text("\(boardGameChosen?.locationTitle ?? "Unknown")")
//                                            .padding(.horizontal)
//                }
//            }
            
            
            
            
//                NavigationLink(destination: locationView())
//                {
//                    Text("\(boardGameChosen?.locationTitle ?? "Unknown")")
//                        .padding(.horizontal)
//                }
            
                    
                   
                    
//                Spacer()
            
            
           
            
            
                    Spacer()

                }
        }.navigationBarTitle(Text("Detail"))
        
//        If text is Type Here it doesn't add to the variables in the class
       if note == "Type Here" {
                             
                         } else {
                             boardGameChosen?.notes = "\(note)"
                         }
                         
                         if name == "Type Here" {
                             
                         } else {
                             boardGameChosen?.name = "\(name)"
                         }
                         
                         if subtitle == "Type Here" {
                             
                         } else {
                             boardGameChosen?.subtitle = "\(subtitle)"
                         }
                         if description == "Type Here" {
                             
                         } else {
                             boardGameChosen?.description = "\(description)"
                         }
                         if pro == "Type Here" {
                             
                         } else {
                             boardGameChosen?.pro = "\(pro)"
                         }
                         
                         if con == "Type Here" {
                             
                         } else {
                             boardGameChosen?.con = "\(con)"
                         }
                         
                         
                         if url == "Type Here" {
                             
                         } else {
                             
// This adds uiimage data to class, from url
                            
                            boardGameChosen?.image = "\(url)"
                            

                             
                             
                         }

        return view
        
                
            
        }
    
        

}
//
struct ContentView_Previews: PreviewProvider {
    static var previews: some View {
       ContentViewTwo(boardGameChosen: BoardGameJSONTEST("name", "sub", "desc", "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", "pro", "con", "notes", "Location Title", 0, 0), boardGame: [BoardGameJSONTEST("name", "sub", "desc", "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", "pro", "con", "notes", "Location Title", 0, 0), BoardGameJSONTEST("name", "sub", "desc", "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", "pro", "con", "notes", "Location Title", 0, 0),BoardGameJSONTEST("name", "sub", "desc", "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", "pro", "con", "notes", "Location Title", 0, 0)])
    }
}


