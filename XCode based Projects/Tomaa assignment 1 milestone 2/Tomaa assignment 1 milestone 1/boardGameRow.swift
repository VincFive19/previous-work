//
//  boardGameRow.swift
//  Tomaa assignment 1 milestone 1
//
//  Created by Tomas Heligr-Pyke on 11/3/20.
//  Copyright © 2020 griffith. All rights reserved.
//

import SwiftUI

struct boardGameRow: View {
    
//    var boardGame: BoardGame
    
    var body: some View {
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
}

struct boardGameRow_Previews: PreviewProvider {
    static var previews: some View {
        boardGameRow()
    }
}
