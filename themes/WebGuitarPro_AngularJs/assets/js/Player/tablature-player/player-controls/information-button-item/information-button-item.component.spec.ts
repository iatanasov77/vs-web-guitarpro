import { ComponentFixture, TestBed } from '@angular/core/testing';

import { InformationButtonItemComponent } from './information-button-item.component';

describe('InformationButtonItemComponent', () => {
  let component: InformationButtonItemComponent;
  let fixture: ComponentFixture<InformationButtonItemComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ InformationButtonItemComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(InformationButtonItemComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
