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



var boardGameInitial = BoardGame("test","test","test", UIImage(named: "test")!,"test","test","test")

// This isn't used anymore as everything is now in a class to create the array. I used this struct during testing
struct boardGamesStruct {
//    static var yourVariable = "someString"
//    let id = UUID()
//    : Observable<Int> = Observable.from([1,2,3])
//    @ObservedObject static var boardGames: [BoardGame] =  [BoardGame("test","test","test","test","test","test","test"), BoardGame("test","test","test","test","test","test","test"),BoardGame("test","test","test","test","test","test","test")]
    
//    var boardGames = BoardGameArray().boardGames
   
}



// The Main View
struct mainView: View {
    
//    let one  = BoardGame("test","test","test","test","test","test","test")
//    let two =  BoardGame("test","test","test","test","test","test","test")
//    let three = BoardGame("test","test","test","test","test","test","test")
//    
    
//    @State var boardGames = boardGamesStruct.boardGames2
    
//    Creates accessible array which also had state, allowing it to be updated.
//    @State var boardGames = BoardGameArray().boardGames
    @State var boardGames = BoardGameArray().boardGames
    
//    let boardGames = ["test", "two", "three"]
    
//    @Binding var boardGames: [BoardGame]
    
//    let indexSet = IndexSet(boardGames)
    
    
    // View Creation
    var body: some View {
        
        // Counts how many in array
        var boardGameCount = boardGames.count
//        HStack {
        
        // Created view as variable in order to remove opaque error
        var navView = NavigationView() {
            
            // List
            List {
                        ForEach(0..<boardGameCount, id: \.self) { i in
                            
                            NavigationLink(
                                // Links to Content View Two, further below
                                destination: ContentViewTwo(boardGameChosen: self.boardGames[i])
                            ) {
            //                    Text("\(self.boardGames[i].name)")
                                
                                HStack(){
//                                    var imageView: UIImageView
                                    
//                                    UIImageView()
//                                    UIImage(contentsOfFile: self.boardGames[i].image)
//                                        Image(                                    self.boardGames[i].image)
                                    Image(uiImage: self.boardGames[i].image)
                                        .resizable()
                                        .scaledToFit()
                                    
                                    VStack(alignment: .leading) {
                                        Text("\(self.boardGames[i].name)")
                                            .bold()
                                        Text("\(self.boardGames[i].description)")
                                        
                                    }
                                }
                                
                                            
                            }
                                
                            
//                }
//                        }.onDelete(perform: onDelete(offsets: $0))
//                        }.onDelete(perform: boardGamesStruct.boardGames.remove(at: $0))

//                        }.onDelete(perform: removeRows)
//                        }.onDelete(perform: BoardGameArray().boardGames.remove(at: $0))
                        }.onDelete {(indexSet) in
                            self.boardGames.remove(atOffsets: indexSet)}
                
                        
                        
            }.navigationBarItems(
                        leading: EditButton(),
                        trailing: Button(
                            action: {
                                withAnimation {
//                                    add()
                                    self.boardGames.insert(BoardGame("name", "sub", "desc", UIImage(named: "test")!, "pro", "con", "notes"), at: 0)
                                    

                                }



//                                    boardGamesStruct.boardGames.insert(BoardGame("name", "sub", "desc", "test", "pro", "con", "notes"), at: 0) }
//                                return AnyView(EmptyView())
                            }
                        ) {
                            Image(systemName: "plus")
                        }
                    )
            
            
        }
        
//        self.setNeedsDisplay()
        
        return navView
//        }
//        return ContentView
        
        
         
//        NavigationView {
//            ForEach(boardGames, id: \.self) { i in
//
////                HStack(){
//
//
//
//                    Image(systemName: "cloud.heavyrain.fill")
//                    VStack(alignment: .leading) {
//                        Text("\(boardGames[i].name)")
//                            .bold()
//                        Text("\(boardGames[i].description)")
//                        Text("- It is big")
//
//
////                                    }
//                                }
//            }
////                    List {
////                        HStack(){
////                            Image(systemName: "cloud.heavyrain.fill")
////                            VStack(alignment: .leading) {
////                                Text("The Mega Jenga")
////                                    .bold()
////                                Text("It is very megery")
////
////                                Text("- It is big")
////
////
////                            }
////                        }
////                    }
//                }.navigationBarTitle("List")
    }
    
    
}




struct ContentViewTwo: View {
    
//    var boardGame = BoardGame("Jenga", "Jenga for Jengaring", "Jenga is a fun tower stacking board game", "jenga", "fun", "Topples")
   
    
    @State var boardGameChosen: BoardGame?
//    var boardGame = boardGameChosen
    @State private var note: String = "Type Here"
    @State private var name: String = "Type Here"
    @State private var subtitle: String = "Type Here"
    @State private var description: String = "Type Here"
    @State private var pro: String = "Type Here"
    @State private var con: String = "Type Here"
    @State private var url: String = "Type Here"
    
    
    
    var body: some View {
//        let note = self.boardGameChosen?.notes ?? "No note"
        
        

        
        
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
                        
            
            
        let view = VStack() {
                
//            Images
            
//            THIS IS WHERE ABOVE ERROR HAPPENS
            Image(uiImage: (boardGameChosen?.image)!)
                    .resizable()
                    .aspectRatio(contentMode: .fit)
//                    .edgesIgnoringSafeArea(.top)
//
                    
            
//            Headings
            
//                var image = #imageLiteral(resourceName: "jenga")
//                var chat = UIImage(named: "jenga")
//                var chatImageView = UIImageView(image: chat)
            TextField("Enter your image URL", text: $url)
                .padding(.horizontal)
            TextField("Enter your Title", text: $name)
                .padding(.horizontal)
                Text("\(boardGameChosen?.name ?? "Unknown")")
                    .font(.title)
            TextField("Enter your Subtitle", text: $subtitle)
                .padding(.horizontal)
                Text("\(boardGameChosen?.subtitle ?? "Unknownw")").font(.subheadline).fontWeight(.regular)
                
//                VStack() {
                    
//            Description
                    HStack() {
                        Text("Description:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading).padding(.leading)
//                        Text("\(boardGame.description)").font(.body).multilineTextAlignment(.leading)
//                    }
//                    HStack() {
                        TextField("Enter your Note", text: $description)
                            
                        Text("\(boardGameChosen?.description ?? "Unknown")").font(.subheadline).multilineTextAlignment(.leading).padding(.horizontal)
                        
                        
                    }
            
//            Pros
                    HStack() {
                        Text("Pros:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading).padding(.leading)
//                    }
//                    HStack() {
                        TextField("Enter your Note", text: $pro)
                        Text("\(boardGameChosen?.pro ?? "Unknown")").font(.subheadline).multilineTextAlignment(.leading).padding(.horizontal)
                    }
            
            
            
//            Cons
                    HStack() {
                        Text("Cons:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading).padding(.leading)
//                    }
//                    HStack() {
                        TextField("Enter your Note", text: $con)
                        Text("\(boardGameChosen?.con ?? "Unknown")").font(.subheadline).multilineTextAlignment(.leading).padding(.horizontal)
                    
            }
//            Notes
            HStack() {
                        
                TextField("Enter your Note", text: $note)
                    .padding(.leading)
                Text("\(boardGameChosen?.notes ?? "Unknown")")
                    .padding(.horizontal)
                        
                        
                    }
                    
                   
                    
//                Spacer()
            
            
           
            
            
                    
                }
        
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
                             
//                             This doesn't work at the moment
                            let urlSearch = URL(string: url) ?? URL(string: "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg" )
                             
                            let data = try? Data(contentsOf: (((urlSearch ?? URL(string: "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg" )!))!) )
                            
                            // Yes I know I shouldn't use ! to escape, but otherwise it would require me to have 3 diferent optionals, which won't be the case, as the first one will be used

                             if let imageData = data {
                                 let image = UIImage(data: imageData)
//                                UIImage(data: imageData)
                                 boardGameChosen?.image = image!
//                                Image(uiImage: (image ?? image)!)
                                
                                print(type(of: image))
                             }
                             
                             
                             
                             
                             // https://stackoverflow.com/questions/39813497/swift-3-display-image-from-url for testing
                             
                             
                         }
        
        
        
        return view
        
                
            
        }
    
        
//        HStack(){
        
        
//        }
//    }
}



//private func onDelete(offsets: Int) {
//    boardGamesStruct.boardGames.remove(at: offsets)
//}

        func removeRows(at offsets: IndexSet) {
            print(offsets)
//            print(boardGamesStruct.boardGames)
            BoardGameArray().boardGames.remove(atOffsets: offsets)
//            print(boardGamesStruct.boardGames)
            
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
