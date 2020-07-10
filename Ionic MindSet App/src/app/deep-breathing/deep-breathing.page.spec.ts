import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DeepBreathingPage } from './deep-breathing.page';

describe('DeepBreathingPage', () => {
  let component: DeepBreathingPage;
  let fixture: ComponentFixture<DeepBreathingPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DeepBreathingPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DeepBreathingPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
