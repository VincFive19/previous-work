import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { OldJournalEntryPage } from './old-journal-entry.page';

const routes: Routes = [
  {
    path: '',
    component: OldJournalEntryPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [OldJournalEntryPage]
})
export class OldJournalEntryPageModule {}
