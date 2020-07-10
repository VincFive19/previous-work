//
//  Model.swift
//  Tomaa assignment 1 milestone 1
//
//  Created by Tomas Heligr-Pyke on 23/4/20.
//  Copyright © 2020 griffith. All rights reserved.
//

import Foundation
import UIKit
import CoreData


/// <#This removes the rows specified at the index#>
/// - Parameters:
/// - - att Offsets: <# Is an indexSet, gets the indexset #>
func removeRows(at offsets: IndexSet) {
    print(offsets)
    
    
    // gets offset then removes at the index
    BoardGameArray().boardGames.remove(atOffsets: offsets)

//    deleteCoreData(name: <#T##String#>)
}


//MARK: Saves the data to a file (Existing or non exisitng)
/// <#This saves file to JSON file#>
/// - Parameters:
/// - - fileToSave: <#Gets the board game array #>
func saveFile(fileToSave: Array<BoardGameJSONTEST>) {
    
    print("SAVE")
    
    
    do {
        let urls = FileManager.default.urls(for: .documentDirectory, in: .userDomainMask)
        let documentFolderURL = urls.first!
        let fileURL = documentFolderURL.appendingPathComponent("saved.txt")
        let json = JSONEncoder()
        let data = try json.encode(fileToSave)
//        BoardGameArray().boardGames
    try data.write(to: fileURL)
        // For debugging
        print(try JSONDecoder().decode([BoardGameJSONTEST].self, from: try Data(contentsOf: fileURL))[1].name as Any)
        print("----")
    
    } catch {
        print("Fail, didn't save")
    }
}

//MARK: Creates a new file
/// Creates a new file if now JSON file exists

func newFile() {
    
    print("NEW FILE")
    do {
        let urls = FileManager.default.urls(for: .documentDirectory, in: .userDomainMask)
        let documentFolderURL = urls.first!
        let fileURL = documentFolderURL.appendingPathComponent("saved.txt")
        let json = JSONEncoder()
        let data = try json.encode(BoardGameArray().boardGames)
        try data.write(to: fileURL)
    
    } catch {
        print("Fail new file")
    }
}


//MARK: Decodes the existing json file, if no file exists it creates a new file
/// <#Decodes the JSON File#>
/// - Returns: Array<BoardGameJSONTEST>?:  Returns the array gathered from the file
func decodeFile()-> Array<BoardGameJSONTEST>?{
    print("DECODE")
    let urls = FileManager.default.urls(for: .documentDirectory, in: .userDomainMask)
    let documentFolderURL = urls.first!
    let fileURL = documentFolderURL.appendingPathComponent("saved.txt")
        
    
    // if no file exists creates a new one
    if FileManager().fileExists(atPath: fileURL.path) == false {
        newFile()
        
    }
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
        
        print(data)
        return(data)
    
    } catch {
        print("Failed decode")
        return nil
    }
    
}



//MARK: Initial image global variable
/// <# Creates the Initial image Variable #>

let initialImage = UIImage(named: "test")

//MARK: Add to array function
/// <#Adds to the board game array, and saves it to file.#>

func add() {
    BoardGameArray().boardGames
    .insert(boardGameInitial, at: 0)
    saveFile(fileToSave: BoardGameArray().boardGames)
    print("Saved new")
}


//MARK: Initial value class, for creation of new array members
public class BoardGameSingleInitial: ObservableObject, Identifiable {
//    @Published var boardGameInitial: BoardGame = BoardGameJSONTEST("name", "sub", "desc", "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", "pro", "con", "notes")

}


var boardGameArray: Array<BoardGameJSONTEST> = []

//MARK: Find Core Data Function - equivalent of jsondecode function
/// <#Finds data in core data#>
/// - Returns: Array<BoardGameJSONTEST>? -  the array of items in the core data

///
func findCoreData() -> Array<BoardGameJSONTEST>? {
    // refer to created container in appDelegate
    
    
            let appDelegate = UIApplication.shared.delegate as? AppDelegate

    //
        let managedContext = appDelegate!.persistentContainer.viewContext

    // Retreievs the "Saved" Core Data Table
            let fetchRequest = NSFetchRequest<NSFetchRequestResult>(entityName: "Saved")

    do {
        // Returns the result
        var result = try managedContext.fetch(fetchRequest)
        
        
        // If result is empty then run the initialcoredata function to create a new coredata intiially data, then save result again
        if result.isEmpty == true {
            saveInitialCoreData()
            result = try managedContext.fetch(fetchRequest)
        }
        
        
        // If data exists then get all data from result, and add this to the array
        for data in result as! [NSManagedObject] {
            let boardGameData = BoardGameJSONTEST(data.value(forKey: "name") as! String, data.value(forKey: "subtitle") as! String, data.value(forKey: "desc") as! String, data.value(forKey: "image") as! String, data.value(forKey: "pro") as! String, data.value(forKey: "con") as! String, data.value(forKey: "notes") as! String, data.value(forKey: "locationTitle") as! String, data.value(forKey: "longitude") as! Double, data.value(forKey: "latitude") as! Double
           )
            
            // Append to the array
            boardGameArray.self.append(boardGameData)
            
            
        }
        
        // Return that array
        return(boardGameArray)

//        var boardGamesListed = data.value(forKey: "boardGames")

//        return(boardGamesListed as AnyObject)
    } catch {
        print("failed")
        return nil
    }

//    return(nil)

//                for data in result as! [NSManagedObject] {
//                    var boardGamesListed = data.value(forKey: "boardGames")
//                    return(boardGamesListed)
//                }

}

//MARK: Saves to CoreData
/// This saves to CoreData
/// - Returns: A string,
func saveToCoreData()-> String {
    
//    var boardGameInput = boardGameInput
    
    // Coredata startup code, opens the Saved container
   let appDelegate = UIApplication.shared.delegate as? AppDelegate
       let managedContext = appDelegate!.persistentContainer.viewContext
       let fetchRequest = NSFetchRequest<NSFetchRequestResult>(entityName: "Saved")
   let entity = NSEntityDescription.entity(forEntityName: "Saved", in: managedContext)!
    
    var count = 0
    
    // get the result and the count of the result.
    do {
        let result = try managedContext.fetch(fetchRequest)
        count = result.count
    } catch {
        print("Fail")
    }
   
    // This saves it back into coreData. setValue sets the value for the keys
       let saved = NSManagedObject(entity: entity, insertInto: managedContext)
       saved.setValue("name \(count)", forKey: "name")
       saved.setValue("subtitle", forKey: "subtitle")
       saved.setValue("desc", forKey: "desc")
       saved.setValue("https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", forKey: "image")
       saved.setValue("pro", forKey: "pro")
       saved.setValue("con", forKey: "con")
       saved.setValue("notes", forKey: "notes")
    saved.setValue("locationTitle", forKey: "locationTitle")
    saved.setValue(0, forKey: "longitude")
    saved.setValue(0, forKey: "latitude")
        
    
//    boardGameInput.append(BoardGameJSONTEST("name \(count)", "sub", "desc", "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", "pro", "con", "notes"))
// Try to save, catch if error, then return
   do {
       try managedContext.save()
        return("name \(count)")
   } catch let error as NSError {
       print(error)
        return("Error")
   }
}


//MARK: Delete
/// Deletes from CoreData
/// - Parameters:
/// - name: String, used to find the exact location of table in coredata.
func deleteCoreData(name: String) {
    
    // Coredata start up
    let appDelegate = UIApplication.shared.delegate as? AppDelegate


    let managedContext = appDelegate!.persistentContainer.viewContext

    let fetchRequest = NSFetchRequest<NSFetchRequestResult>(entityName: "Saved")
    
    // Find specific coredata value according to the name
    fetchRequest.predicate = NSPredicate(format: "name = %@", name)
    
    
    // Try to remove at the results from the fetch, then delete this. Only deletes first if multiple results are given.
    do {
        let test = try managedContext.fetch(fetchRequest)
        
        let objectToDelete = test[0] as! NSManagedObject
        managedContext.delete(objectToDelete)
        do {
            try managedContext.save()
        } catch {
            print(error)
        }
    } catch {
        print(error)
    }
}

//MARK: Update CoreData Value
/// Update Core Data
/// - Parameters:
///     - data: BoardGameJSONTEST, the array with all data in it from the main app
///     - initialName: String, the originally name of the new array object
func updateCoreData(data: BoardGameJSONTEST, initialName: String) {
    
    // Core Data startup scripts
    let appDelegate = UIApplication.shared.delegate as? AppDelegate


    let managedContext = appDelegate!.persistentContainer.viewContext

    let fetchRequest = NSFetchRequest<NSFetchRequestResult>(entityName: "Saved")
    
    
    // Find according to name
    fetchRequest.predicate = NSPredicate(format: "name = %@", initialName as CVarArg)
    
    
    // Try to set the value of the individual coredata attributes. if fail then return an error. If fine then try and save.
    do {
        let test = try managedContext.fetch(fetchRequest)
        
        let objectToUpdate = test[0] as! NSManagedObject
        objectToUpdate.setValue(data.name, forKey: "name")
        objectToUpdate.setValue(data.subtitle, forKey: "subtitle")
        objectToUpdate.setValue(data.description, forKey: "desc")
        objectToUpdate.setValue(data.image, forKey: "image")
        objectToUpdate.setValue(data.pro, forKey: "pro")
        objectToUpdate.setValue(data.con, forKey: "con")
        objectToUpdate.setValue(data.notes, forKey: "notes")
        objectToUpdate.setValue(data.locationTitle, forKey: "locationTitle")
        objectToUpdate.setValue(data.longitude, forKey: "longitude")
        objectToUpdate.setValue(data.latitude, forKey: "latitude")
    
        do {
            try managedContext.save()
        } catch {
            print(error)
        }
    } catch {
        print(error)
    }
}


//MARK: Saves initial if not exists coreData
/// Saves to coredata if nothing exists creating some temporary placeholders. and initial data
///
func saveInitialCoreData() {
    
    // coredata setup
     let appDelegate = UIApplication.shared.delegate as? AppDelegate
        let managedContext = appDelegate!.persistentContainer.viewContext
    //    let fetchRequest = NSFetchRequest<NSFetchRequestResult>(entityName: "Saved")
    let entity = NSEntityDescription.entity(forEntityName: "Saved", in: managedContext)!
        
    
    // Creates new set of coredata data, times 3. Name goes up in number.
    for i in 1...3 {
        let saved = NSManagedObject(entity: entity, insertInto: managedContext)
        saved.setValue("name \(i)", forKey: "name")
        saved.setValue("subtitle", forKey: "subtitle")
        saved.setValue("desc", forKey: "desc")
        saved.setValue("image", forKey: "image")
        saved.setValue("pro", forKey: "pro")
        saved.setValue("con", forKey: "con")
        saved.setValue("notes", forKey: "notes")
        saved.setValue("locationTitle", forKey: "locationTitle")
        saved.setValue(0, forKey: "longitude")
        saved.setValue(0, forKey: "latitude")
    }
    
    do {
        try managedContext.save()
    } catch let error as NSError {
        print(error)
    }
}


//MARK: Creates initial array
/// Class that creates intiial array
public class BoardGameArray: ObservableObject, Identifiable {

    
    @Published var boardGames: [BoardGameJSONTEST] = [BoardGameJSONTEST("name", "sub", "desc", "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", "pro", "con", "notes", "Location Title", 0, 0), BoardGameJSONTEST("name", "sub", "desc", "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", "pro", "con", "notes", "Location Title", 0, 0),BoardGameJSONTEST("name", "sub", "desc", "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg", "pro", "con", "notes", "Location Title", 0, 0)]
    

}



//MARK: Returns UI Image from URL
///Returns a UIIMage from a URL, this function does the bulk of the data processing for URL Images.
/// - Parameters:
///     - url: String, the url of where the image is
/// - Returns: UIImage, the image is returned for display.
func image(url: String)->UIImage? {
    
    
    // Get the url
    let urlSearch = URL(string: url) ?? URL(string: "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg" )
                 
    
    // Get data from that URL
    let data = (try? Data(contentsOf: ((urlSearch ?? URL(string: "https://myer-media.com.au/wcsstore/MyerCatalogAssetStore/images/65/654/5511/10/1/605310780_349306180/605310780_349306180_3_720x928.jpg" ))!)))
    
    
    // If no data from URL then this variable will run the intiial image, and use that data.
    let ifnone = UIImage(imageLiteralResourceName: "test").pngData()
                 
    
    // saves image data as UIImage and returns
    let image = UIImage(data: data ?? ifnone!)
    return(image)
    
//    if let imageData = data {
//        let image = UIImage(data: imageData)
//        return(image)
//    }
}


// move function

