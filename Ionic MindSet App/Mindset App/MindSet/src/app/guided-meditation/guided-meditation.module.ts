import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { GuidedMeditationPage } from './guided-meditation.page';

const routes: Routes = [
  {
    path: '',
    component: GuidedMeditationPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [GuidedMeditationPage]
})
export class GuidedMeditationPageModule {}
