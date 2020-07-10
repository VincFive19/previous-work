import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { EditjournalentryPage } from './editjournalentry.page';

const routes: Routes = [
  {
    path: '',
    component: EditjournalentryPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [EditjournalentryPage]
})
export class EditjournalentryPageModule {}
