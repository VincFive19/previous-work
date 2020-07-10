import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GuidedMeditationPage } from './guided-meditation.page';

describe('GuidedMeditationPage', () => {
  let component: GuidedMeditationPage;
  let fixture: ComponentFixture<GuidedMeditationPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GuidedMeditationPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GuidedMeditationPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
