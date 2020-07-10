import { Injectable } from '@angular/core';
import { Storage } from '@ionic/storage';

@Injectable({
  providedIn: 'root'
})
export class StorageService {

  constructor(private storage: Storage) { }

  //Stores item as journal entry
  async storageJournals(store) {
    this.storage.set("journals", store);
  }
}
