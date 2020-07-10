//
//  Tomaa_assignment_1_milestone_1Tests.swift
//  Tomaa assignment 1 milestone 1Tests
//
//  Created by Tomas Heligr-Pyke on 2/3/20.
//  Copyright © 2020 griffith. All rights reserved.
//

import XCTest

@testable import Tomaa_assignment_1_milestone_1

class Tomaa_assignment_1_milestone_1Tests: XCTestCase {
    var boardGame: BoardGame?
    
    override func setUp() {
        // Put setup code here. This method is called before the invocation of each test method in the class.
        boardGame = BoardGame("Jenga", "Jenga for Jengaring", "Jenga is a fun tower stacking board game", "jengaimageidentifier", "pro", "Con")
    }

    override func tearDown() {
        // Put teardown code here. This method is called after the invocation of each test method in the class.
    }

    func testExample() {
        // This is an example of a functional test case.
        // Use XCTAssert and related functions to verify your tests produce the correct results.
    }
    
    

    func testNilTest() {
//       XCTAssertEqual(typeBoard, "")
        XCTAssertNotNil(boardGame)
    }
    
    func stringTestName() {
    //       XCTAssertEqual(typeBoard, "")
        XCTAssertEqual(boardGame?.name, "Jenga")
        
        }
    
    func stringTestDescription() {
    //       XCTAssertEqual(typeBoard, "")
        XCTAssertEqual(boardGame?.description, "Jenga for Jengaring")
        }
    
    func stringTestSubtitle() {
    //       XCTAssertEqual(typeBoard, "")
        XCTAssertEqual(boardGame?.subtitle, "Jenga is a fun tower stacking board game")
        }
    
    func imageTest() {
        XCTAssertNotNil(boardGame?.image)
    }
    
    func testPerformanceExample() {
        // This is an example of a performance test case.
        self.measure {
            // Put the code you want to measure the time of here.
        }
    }

}
