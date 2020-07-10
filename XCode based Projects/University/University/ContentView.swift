//
//  ContentView.swift
//  University
//
//  Created by Tomas Heligr-Pyke on 4/3/20.
//  Copyright © 2020 Tomas Heligr-Pyke. All rights reserved.
//

import SwiftUI

struct ContentView: View {
    var body: some View {
        
        
        print("What is your name?")

        let name: String = readLine() ?? "Unknown"

        print("Hello \(name)")


        
        
        
        print("welcome to \(name)'s bank.")

        var amount = 0.0


        func greeting() {
                print("Command?")
                var input = readLine()
        if input == "d" {
            deposit()
        } else if input == "b"{
            balance()
        } else if input == "w" {
            withdraw()
        } else if input == "q" {
             print("Thanks for using \(name)'s bank.")
        }
        }


        func balance() {
                print("Balance = $\(amount)")
               greeting()
        }


        func deposit() {
                print("Amount?")
            var depositAmount = (readLine() as! NSString).doubleValue
            
               amount += depositAmount
               greeting()
        }

        func withdraw() {
                print("Amount?")
            var withdrawAmount = (readLine() as! NSString).doubleValue
               amount -= withdrawAmount
               greeting()
        }
    
    }
}

struct ContentView_Previews: PreviewProvider {
    static var previews: some View {
        ContentView()
    }
}
