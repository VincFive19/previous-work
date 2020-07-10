//
//  locationView.swift
//  Tomaa assignment 1 milestone 1
//
//  Created by Tomas Heligr-Pyke on 2/5/20.
//  Copyright © 2020 griffith. All rights reserved.
//

import CoreLocation
import SwiftUI
import MapKit

//MARK: ANNOTATION CLASS
class Annotation: NSObject, MKAnnotation {
    var coordinate: CLLocationCoordinate2D
    var title: String?
    
    
    init(coordinate: CLLocationCoordinate2D, title: String?){
        self.coordinate = coordinate
        self.title = title
    }
    
}

// Created with help from https://www.iosapptemplates.com/blog/swiftui/map-view-swiftui
//MARK: MapView Struct
struct MapView: UIViewRepresentable {
  
    @State var annotation: MKPointAnnotation
    @State var centerCoordinate: CLLocationCoordinate2D
    
    
  var locationManager = CLLocationManager()
    
    //Setup
  func setupManager() {
    locationManager.desiredAccuracy = kCLLocationAccuracyBest
    locationManager.requestWhenInUseAuthorization()
    locationManager.requestAlwaysAuthorization()
  }
  
    
    //Creates the initial mapView
  func makeUIView(context: Context) -> MKMapView {
    setupManager()
    var mapView = MKMapView(frame: UIScreen.main.bounds)

    mapView.showsUserLocation = true
    

    return mapView
  }
  
  func updateUIView(_ uiView: MKMapView, context: Context) {
    
    // This adds an annotation to the map, and then centres the map onto those coords
    uiView.addAnnotation(annotation)

    uiView.centerCoordinate = annotation.coordinate
  }
}



// Location View
struct locationView: View {
    
    // State variables
    @State var boardGameChosen: BoardGameJSONTEST?
    
//    @State var annotation
    
    @State var latitude: Double = 0
    @State var longitude: Double = 0
    @State var mapPoint = MKPointAnnotation()
    
    @State var latitudeString: String = ""
    @State var longitudeString: String = ""
    
//    @State var locationName: String = ""
    
    @State var locationName: String = "Title"
    
    @State var currentPosition = CLLocationCoordinate2D()
    
    @State private var centerCoordinate = CLLocationCoordinate2D()
    
    // Initial Variables Set here
    init(boardGameChosen: BoardGameJSONTEST?) {
        _latitude = State(initialValue: boardGameChosen!.latitude )
        _longitude = State(initialValue: boardGameChosen!.longitude )
        _locationName = State(initialValue: boardGameChosen!.locationTitle! )
        _latitudeString = State(initialValue: "\(latitude)")
        _longitudeString = State(initialValue: "\(longitude)")
        _boardGameChosen = State(initialValue: boardGameChosen!)
    }
    
    
    var body: some View {
        
        
//        latitude = boardGameChosen?.latitude as! Double
//        longitude = boardGameChosen?.longitude as! Double
//        locationName = boardGameChosen?.locationTitle as! String
//        currentPosition = CLLocationCoordinate2D(latitude: boardGameChosen?.latitude ?? 0, longitude: boardGameChosen?.longitude ?? 0)
//
//        latitudeString = "\(latitude)"
//        longitudeString = "\(longitude)"
//        
//        @State currentPosition =
        
        
        mapPoint.title = locationName
        mapPoint.coordinate = CLLocationCoordinate2D(latitude: latitude , longitude: longitude)
        
        
                   
        // returns the view so it isn't ambiguous.
        return NavigationView() {
            VStack {
            
            
            HStack{
                Text("Location:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading).padding(.leading)
                TextField("Location", text: $locationName, onCommit: {
                    let geoCoder = CLGeocoder()
                    let region = CLCircularRegion(center: self.currentPosition, radius: 2_000_000, identifier: "\(self.currentPosition)")
                    geoCoder.geocodeAddressString(self.locationName, in: region) { (placemarks, error) in
                        guard let location = placemarks?.first?.location else{
                            print("Error")
                            return
                        }
                        let position = location.coordinate
                        self.currentPosition.latitude = position.latitude
                        self.currentPosition.longitude = position.longitude
                        self.latitudeString = "\(position.latitude)"
                        self.longitudeString = "\(position.longitude)"
                        self.mapPoint.title = self.locationName
                        self.mapPoint.coordinate = CLLocationCoordinate2D(latitude: self.currentPosition.latitude, longitude: self.currentPosition.longitude)
                        
                        self.longitude = self.currentPosition.longitude
                        self.latitude = self.currentPosition.latitude
                        
                        self.boardGameChosen?.longitude = self.longitude
                        self.boardGameChosen?.latitude = self.latitude
                        self.boardGameChosen?.locationTitle = self.locationName
                        
                        
                        
                        updateCoreData(data: self.boardGameChosen!, initialName: (self.boardGameChosen?.name)!)
                        
                    }
                })
//                    .onAppear {self.locationName = self.boardGameChosen!.locationTitle!; self.mapPoint.coordinate = CLLocationCoordinate2D(latitude: self.latitude , longitude: self.longitude)}
                
            }
            HStack{
                Text("Longitude:").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading).padding(.leading)
                TextField("Longitude", text: $longitudeString, onCommit: {
                    guard let latitude = CLLocationDegrees(self.latitudeString),
                        let longitude = CLLocationDegrees(self.longitudeString) else{
                            print("Coords Invalid")
                            return
                    }
                    self.currentPosition.latitude = Double(latitude)
                    self.currentPosition.longitude = Double(longitude)
                    let geoCoder = CLGeocoder()
                    let position = CLLocation(latitude: self.currentPosition.latitude, longitude: self.currentPosition.longitude)
                    geoCoder.reverseGeocodeLocation(position) { (placemarks, error) in
                        guard let placemark = placemarks?.first else {
                            print("Error locating Longitude")
                            return
                        }
                        self.locationName = placemark.name ?? placemark.locality ?? placemark.subLocality ?? placemark.administrativeArea ?? placemark.country ?? "Unknown Location"
                        
                        self.longitude = self.currentPosition.longitude
                        self.latitude = self.currentPosition.latitude
                        
                       self.mapPoint.title = self.locationName
                        
                       self.mapPoint.coordinate = CLLocationCoordinate2D(latitude: self.currentPosition.latitude, longitude: self.currentPosition.longitude)
                        
                    }
                    
                    
                })
//                .onAppear {self.longitudeString = "\(self.boardGameChosen!.longitude)"; self.mapPoint.coordinate = CLLocationCoordinate2D(latitude: self.latitude , longitude: self.longitude)}
                
            }
            HStack{
                Text("Latitude: ").font(.subheadline).fontWeight(.bold).multilineTextAlignment(.leading).padding(.leading)
                TextField("Latitude", text: $latitudeString, onCommit: {
                    guard let latitude = CLLocationDegrees(self.latitudeString),
                        let longitude = CLLocationDegrees(self.longitudeString) else{
                            print("Coords Invalid")
                            return
                    }
                    self.currentPosition.latitude = latitude
                    self.currentPosition.longitude = longitude
                    let geoCoder = CLGeocoder()
                    let position = CLLocation(latitude: self.currentPosition.latitude, longitude: self.currentPosition.longitude)
                    geoCoder.reverseGeocodeLocation(position) { (placemarks, error) in
                        guard let placemark = placemarks?.first else {
                            print("Error locating Longitude")
                            return
                        }
                        self.locationName = placemark.name ?? placemark.locality ?? placemark.subLocality ?? placemark.administrativeArea ?? placemark.country ?? "Unknown Location"
                        
                        
                        self.longitude = self.currentPosition.longitude
                        self.latitude = self.currentPosition.latitude
                        
                        self.mapPoint.title = self.locationName
                        
                         
                        self.mapPoint.coordinate = CLLocationCoordinate2D(latitude: self.currentPosition.latitude, longitude: self.currentPosition.longitude)
                    }
                })
//                    .onAppear {self.latitudeString = "\(self.boardGameChosen!.latitude)"; self.mapPoint.coordinate = CLLocationCoordinate2D(latitude: self.latitude , longitude: self.longitude)}
                
            }
                
//            MKMapView(frame: UIScreen.main.bounds)
//            mapView
//            MapView(annotation: Annotation(coordinate: CLLocationCoordinate2D(latitude: boardGameChosen?.latitude ?? 0, longitude: boardGameChosen?.longitude ?? 0), title: boardGameChosen?.locationTitle ?? "Unknown"), centerCoordinate: CLLocationCoordinate2D(latitude: boardGameChosen?.latitude ?? 0, longitude: boardGameChosen?.longitude ?? 0)
////                , locationManager: CLLocationManager
//            )
            
            Spacer()
           
            MapView(annotation: mapPoint, centerCoordinate: mapPoint.coordinate
            //                , locationManager: CLLocationManager
                        )
            
            
        }
        }.navigationBarTitle(Text("Map"))
    }
}

//struct locationView_Previews: PreviewProvider {
//    static var previews: some View {
////        locationView()
//    }
//}
