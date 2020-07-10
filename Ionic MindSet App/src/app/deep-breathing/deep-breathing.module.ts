import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { DeepBreathingPage } from './deep-breathing.page';

const routes: Routes = [
  {
    path: '',
    component: DeepBreathingPage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [DeepBreathingPage]
})
export class DeepBreathingPageModule {}
