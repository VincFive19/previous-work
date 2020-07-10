//
//  mainView.swift
//  Tomaa assignment 1 milestone 1
//
//  Created by Tomas Heligr-Pyke on 15/3/20.
//  Copyright © 2020 griffith. All rights reserved.
//

// Quick note I was able to complete Milestone 2 on Tuesday 24th March (As seen with the git repo)
// I was unable to complete this earlier due to being unable to go to uni to use a mac, and needing to get my own mac sorted to be able to preview it in the first place, hence why the last submission was half complete
// Further submissions should be fine due to having a mac at home which can now run xcode.
// Sorry about this

// Please note I was exploring Pods as a dependancy helper, and in doing so installed a pod file, but never used it in this project

import SwiftUI
import UIKit
import CoreData


//var boardGameInitial = BoardGame("test","test","test", UIImage(named: "test")!,"test","test","test")
var boardGameInitial = BoardGameJSONTEST("name", "sub", "desc", "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", "pro", "con", "notes", "Location Title", 0, 0)


//Core Data Struct, to be moved to its own file. Please note, my working was that if I save the whole array in the core data file it will save time. However I am aware and understand that, like sql, you can have multiple objects in the same table.

// I did it this way as it means I wouldn't have to change most of my code, plus helps me test if it is working before I was to change all the code

//https://medium.com/@ankurvekariya/core-data-crud-with-swift-4-2-for-beginners-40efe4e7d1cc

// Ignore this for now, worked on coredata before json as I got confused with the milestones, leaving this here for future reference






// The Main View
struct mainView: View {
    
    
    // Creates STATE variable which gets values from JSON
//    @State var boardGames = decodeFile()
    @State var boardGames: Array<BoardGameJSONTEST>
    
    
    init() {
    
        _boardGames = State(initialValue: findCoreData()!)
//        _boardGames = State(initialValue: nil)
    }
    
    
    
    
    // View Creation
    var body: some View {
        func viewWillAppear() {
        //        super.viewWillAppear(animated) // No need for semicolon
                
            }
        
        // This is for testing
        do {
                let urls = FileManager.default.urls(for: .documentDirectory, in: .userDomainMask)
                let documentFolderURL = urls.first!
                let fileURL = documentFolderURL.appendingPathComponent("saved.txt")
                
                print(fileURL)
                
                let decoded = try Data(contentsOf: fileURL)
                
                print("Decoded", decoded)
                
                let json = JSONDecoder()
            let data = try json.decode([BoardGameJSONTEST].self, from: decoded)
            //    try data.write(to: fileURL)
            print("datam", data)
                
            
            } catch {
                print("Failed")
                
            }
        
        
        // Counts how many in array
        let boardGameCount = boardGames.count ?? 0

        // Created view as variable in order to remove opaque error
        let navView = NavigationView() {
            
            
            
            
            // List of main view
            List {
                
                
                        ForEach(0..<boardGameCount, id: \.self) { i in
                            
                            NavigationLink(
                                // Links to Content View Two, further below
                                destination: ContentViewTwo(boardGameChosen: (self.boardGames[i] ), boardGame: self.boardGames )
                            ) {

                                //Main View Creation
                                HStack(){
                                    Image(uiImage: image(url: (self.boardGames[i] ).image  ?? "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg")!)
                                    .resizable()
                                    .scaledToFit()
                                    .frame(width: 100.0,height:100)
                                    
                                        
                                    
//
                                    VStack(alignment: .leading) {
//                                        Text("\((self.boardGames?[i] as AnyObject).name ?? "Unknown")")
//                                            .bold()
                                        Text("\((self.boardGames[i] ).name ?? "unknown")")
                                        .bold()
                                        Text("\((self.boardGames[i] ).description ?? "Unknown")")
                                        
                                    }
                                }
                                
                                            
                            }
                                
                            
// On deletion
                        }.onDelete {(indexSet) in
                            
                            // Deletes from array and from core data through name
                            let indexes = indexSet.map({$0})
                            
                            deleteCoreData(name: self.boardGames[indexes[0]].name!)
                            self.boardGames.remove(atOffsets: indexSet)
                            
                        }
                        .onMove(perform: move)
                
                
                
                        
                   
            }.navigationBarTitle("Favourite Things")
                //Creates the menu buttons items, in this case Edit and Add.
            .navigationBarItems(
                        leading: EditButton(),
                        trailing: Button(
                            action: {
                                withAnimation {
                                    // Makes sure to save to coredata, then adds it to the array.
                                    let name = saveToCoreData()
                                    self.boardGames.insert(BoardGameJSONTEST(name, "sub", "desc", "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", "pro", "con", "notes", "Location Title", 0, 0), at: 0)
                                   
                                   

                                }



                            }
                        ) {
                            Image(systemName: "plus")
                        }
                    )
                //Makes sure to update the array each time it appears
                .onAppear() { print("ViewdidAppear"); self.boardGames.insert(BoardGameJSONTEST("TESTING", "sub", "desc", "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", "pro", "con", "notes", "Location Title", 0, 0), at: 0); self.boardGames.remove(at: 0)}
//                .onAppear() { print("ViewdidAppear"); self.boardGames = findCoreData()!}
            
            
        }
        
        
//        boardGames = findCoreData()
        
        // Returns the view for display
        return navView
        
        

    }
    
    
    // This moves the list around
    func move(from source: IndexSet, to destination: Int) {
        self.boardGames.move(fromOffsets: source, toOffset: destination)
    }
}










        

struct mainView_Previews: PreviewProvider {
    static var previews: some View {
//        mainView(boardGames: BoardGame)
        
        
//        NavigationView {
        mainView()
//        }
        
//        ContentViewTwo()
    }
}
